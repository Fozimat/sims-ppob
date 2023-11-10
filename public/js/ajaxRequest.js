$(document).ready(function () {
    const token = localStorage.getItem("token");
    const envUrl = "https://take-home-test-api.nutech-integrasi.app/";

    const endpointProfile = "profile";
    const endpointBalance = "balance";
    const endpointServices = "services";
    const endpointBanner = "banner";

    const apiUrlProfile = envUrl + endpointProfile;
    const apiUrlBalance = envUrl + endpointBalance;
    const apiUrlServices = envUrl + endpointServices;
    const apiUrlBanner = envUrl + endpointBanner;

    function ajaxProfile() {
        $.ajax({
            type: "GET",
            url: apiUrlProfile,
            headers: {
                "Authorization": 'Bearer ' + token,
            },
            success: function (response) {
                $('#full_name').text(`${response.data.first_name} ${response.data.last_name}`)
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    let selectedButton = null;

    $('.button-nominal').click(function () {
        const selectedNominal = $(this).data('nominal');

        if (selectedButton === this) {
            $(this).css({ 'background-color': 'white', 'color': 'black' });
            $('#nominalInput').val('');
            $('#btn-topup').prop('disabled', true);
            $('#btn-topup').addClass('bg-gray-400');
            $('#btn-topup').removeClass('bg-red-500');
            selectedButton = null;
        } else {
            $('.button-nominal').css({ 'background-color': 'white', 'color': 'black' });

            $('#nominalInput').prop('disabled', true);

            $(this).css({ 'background-color': 'red', 'color': 'white' });

            $('#nominalInput').val(`Rp${selectedNominal}`);

            $('#btn-topup').removeClass('bg-gray-400');
            $('#btn-topup').addClass('bg-red-500');
            $('#btn-topup').prop('disabled', false);

            selectedButton = this;
        }
    });

    $('#btn-topup').click(function () {
        const selectedNominal = selectedButton ? $(selectedButton).data('nominal') : '';

        showModalDialog(selectedNominal);
    });

    function showModalDialog(nominal) {
        $('#modalTopUpMessage').text('Apakah yakin untuk top up sebesar');
        $('#modalTopNominal').text(` Rp${nominal}?`);
        $('#modalTopUp').removeClass('hidden');

        $('#btnModalCancel').click(function () {
            closeModalDialog();
        });

        $('#btnModalConfirm').click(function () {
            const topUpData = {
                top_up_amount: nominal,
            };

            $.ajax({
                type: "POST",
                headers: {
                    "Authorization": 'Bearer ' + token,
                },
                url: "https://take-home-test-api.nutech-integrasi.app/topup",
                data: JSON.stringify(topUpData),
                contentType: "application/json",
                success: function (response) {
                    showSuccessModal(`Top up sebesar Rp${nominal} berhasil!`);

                    closeModalDialog();
                },
                error: function (xhr, status, error) {
                    showErrorModal(`Top up sebesar Rp${nominal} gagal. Error: ${error}`);

                    closeModalDialog();
                },
            });
        });
    }

    $('#btnModalBack').click(function () {
        selectedButton = null;

        $('.button-nominal').css({ 'background-color': 'white', 'color': 'black' });

        $('#nominalInput').val('');

        $('#nominalInput').prop('disabled', false);

        $('#btn-topup').prop('disabled', true);
        $('#btn-topup').addClass('bg-gray-400');
        $('#btn-topup').removeClass('bg-red-500');

        closeModalDialogBack();
    });

    function closeModalDialogBack() {
        $('#modalSuccess').addClass('hidden');

        $('#btnModalCancel').off('click');
        $('#btnModalConfirm').off('click');
        $('#btnModalBack').off('click');
    }


    function showSuccessModal(message) {
        $('#modalSuccessMessage').text(message);
        $('#modalSuccess').removeClass('hidden');
    }

    function showErrorModal(message) {
        // Display error modal
        $('#modalErrorMessage').text(message);
        $('#modalError').removeClass('hidden');
    }



    function closeModalDialog() {
        selectedButton = null;

        $('.button-nominal').css({ 'background-color': 'white', 'color': 'black' });

        $('#nominalInput').prop('disabled', false);

        $('#btn-topup').prop('disabled', true);
        $('#btn-topup').addClass('bg-gray-400');
        $('#btn-topup').removeClass('bg-red-500');

        $('#modalTopUp').addClass('hidden');

        $('#btnModalCancel').off('click');
        $('#btnModalConfirm').off('click');
    }


    function formatRupiah(nominal) {
        return `Rp${nominal.toLocaleString('id-ID')}`;
    }

    function ajaxBalance() {
        const saldoValue = $("#saldo-value");
        const lihatSaldoButton = $("#lihat-saldo-button");
        let saldoVisible = false;

        lihatSaldoButton.click(function () {
            if (saldoVisible) {
                saldoValue.text("********");
                saldoVisible = false;
            } else {
                $.ajax({
                    type: "GET",
                    url: apiUrlBalance,
                    headers: {
                        "Authorization": 'Bearer ' + token,
                    },
                    success: function (response) {
                        saldoValue.text(response.data.balance);
                        saldoVisible = true;
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    }

    function ajaxServices() {
        $.ajax({
            type: 'GET',
            url: apiUrlServices,
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function (response) {
                const servicesContainer = $('#services');
                response.data.forEach(service => {
                    const serviceName = service.service_name;
                    const serviceIcon = service.service_icon;
                    const serviceHTML = `
                <div class="w-1/12 p-2">
                    <div class="bg-white rounded-lg shadow-md text-center">
                    <img src="${serviceIcon}" alt="${serviceName}" class="w-full">
                    </div>
                    <p class="mt-2 text-sm font-semibold text-center">${serviceName}</p>
                </div>
                `;
                    servicesContainer.append(serviceHTML);
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }

    function ajaxBanner() {
        $.ajax({
            url: apiUrlBanner,
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function (response) {
                const gridContainer = $("#banner");
                response.data.forEach((banner) => {
                    const bannerImage = banner.banner_image;

                    const bannerElement = $("<div class='py-5'></div>");
                    const bannerContainer = $("<div class='bg-white rounded-lg shadow-md text-center'></div>");
                    const bannerImg = $(`<img src='${bannerImage}' alt='Banner' class='w-full'>`);

                    bannerContainer.append(bannerImg);
                    bannerElement.append(bannerContainer);
                    gridContainer.append(bannerElement);
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }

    ajaxProfile();
    ajaxBalance();
    ajaxServices();
    ajaxBanner();
});