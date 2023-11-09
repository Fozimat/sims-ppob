<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS - PPOB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50">

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="<?= base_url('assets/Logo.png'); ?>" class="h-8 mr-3" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SIMS PPOB</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Top Up</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Transaction</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Akun</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 mt-4 flex">
        <div class="w-1/2 p-4">
            <img src="<?= base_url('assets/Profile Photo.png'); ?>" alt="Foto Profil">
            <p class="mt-2 text-xl">Selamat Datang,</p>
            <p id="full_name" class="text-4xl font-bold capitalize ">Nama Depan Belakang</p>
        </div>

        <div class="w-1/2 p-4 ml-4">
            <div class="bg-red-500 text-white p-8 rounded-lg">
                <p class="text-sm">Saldo Anda</p>
                <p class="text-3xl">Rp ******</p>
                <p class="text-sm text-blue-200 cursor-pointer mt-2">Lihat Saldo</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 mt-4 flex flex-wrap" id="services">

    </div>

    <div class="container mx-auto p-4 mt-4">
        <div class="text-lg font-semibold">Temukan promo menarik</div>
        <div class="grid grid-cols-4 gap-4" id="banner">

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            const token = localStorage.getItem("token");
            const envUrl = "<?= env('API_BASE_URL'); ?>";

            const endpointProfile = "profile";
            const endpointBalance = "balance";
            const endpointServices = "services";
            const endpointBanner = "banner";

            const apiUrlProfile = envUrl + endpointProfile;
            const apiUrlBalance = envUrl + endpointBalance;
            const apiUrlServices = envUrl + endpointServices;
            const apiUrlBanner = envUrl + endpointBanner;

            const ajaxProfile = {
                type: "GET",
                url: apiUrlProfile,
                headers: {
                    "Authorization": 'Bearer ' + token,
                },
                success: function(response) {
                    $('#full_name').text(`${response.data.first_name} ${response.data.last_name}`)
                },
                error: function(xhr, status, error) {
                    console.error(error);
                },
            };

            const ajaxBalance = {
                type: "GET",
                url: apiUrlBalance,
                headers: {
                    "Authorization": 'Bearer ' + token,
                },
                success: function(balanceResponse) {
                    console.log(balanceResponse);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                },
            };

            const ajaxServices = {
                type: 'GET',
                url: apiUrlServices,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
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
                error: function(xhr, status, error) {
                    console.log(error);
                }
            };

            const ajaxBanner = {
                url: apiUrlBanner,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
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
                error: function(xhr, status, error) {
                    console.log(error);
                }
            };

            $.ajax(ajaxProfile);
            $.ajax(ajaxBalance);
            $.ajax(ajaxServices);
            $.ajax(ajaxBanner);

        });
    </script>
</body>

</html>