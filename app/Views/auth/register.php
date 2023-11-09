<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS - PPOB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="flex">
        <div class="w-1/2 p-6 bg-white">
            <div class="text-center">
                <a href="#" class="flex items-center justify-center">
                    <img src="<?= base_url('assets/Logo.png'); ?>" class="h-8 mr-3" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SIMS PPOB</span>
                </a>
                <p class="text-gray-900 text-2xl font-bold mt-5">Lengkapi data untuk <br> membuat akun</p>
            </div>
            <form class="mt-3 px-24 py-8" id="registration-form" method="POST">
                <div class="mb-5">
                    <div class="relative">
                        <input type="text" id="email" name="email" placeholder="masukkan email anda" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i id="email_icon" class="absolute left-2 top-3 text-gray-400 fas fa-at"></i>
                        <p id="email_registered_error" class="text-red-500 text-sm mt-2 hidden">Email sudah terdaftar</p>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="relative">
                        <input type="text" id="first_name" name="first_name" placeholder="nama depan" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i class="absolute left-2 top-3 text-gray-400 far fa-user"></i>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="relative">
                        <input type="text" id="last_name" name="last_name" placeholder="nama belakang" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i class="absolute left-2 top-3 text-gray-400 far fa-user"></i>
                        <p id="empty_error" class="text-red-500 text-sm mt-2 hidden">Semua kolom wajib diisi.</p>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="buat password" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i id="password_icon" class="absolute left-2 top-3 text-gray-400 fa fa-lock"></i>
                        <p id="password_error" class="text-red-500 text-sm mt-2 hidden">Password kurang dari 8 karakter.</p>
                    </div>
                </div>
                <div class="mb-10">
                    <div class="relative">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="konfirmasi password" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i id="password_confirm_icon" class="absolute left-2 top-3 text-gray-400 fa fa-lock"></i>
                    </div>
                    <p id="password_confirm_error" class="text-red-500 text-sm mt-2 hidden">Password tidak cocok.</p>
                </div>
                <div>
                    <button type="submit" class="w-full bg-red-500 text-white font-semibold py-2 rounded-md hover:bg-red-600 focus:outline-none">
                        Registrasi
                    </button>
                    <p id="register_success" class="text-green-500 text-sm mt-2 text-center hidden">Registrasi berhasil silahkan login</p>
                    <p class="text-gray-500 text-sm mt-12 text-center">sudah punya akun? login <a href="<?= site_url('login'); ?>" class="text-red-700 font-bold">di sini</a></p>

                </div>
            </form>
        </div>

        <div class="w-1/2">
            <img src="<?= base_url('assets/Illustrasi Login.png'); ?>" alt="Ilutrasi Login" class="w-full h-auto">
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#registration-form").submit(function(event) {
            event.preventDefault();

            var email = $("input[name='email']").val();
            var first_name = $("input[name='first_name']").val();
            var last_name = $("input[name='last_name']").val();
            var password = $("input[name='password']").val();
            var password_confirm = $("input[name='password_confirm']").val();
            var valid = true;

            if (email === "" || first_name === "" || last_name === "" || password === "" || password_confirm === "") {
                $("#empty_error").removeClass("hidden");
                valid = false;
            } else {
                $("#empty_error").addClass("hidden");
            }

            if (password.length < 8) {
                $("#password").addClass("border-red-500");
                $("#password_icon").addClass("text-red-500");
                $("#password_error").removeClass("hidden");
                valid = false;
            } else {
                $("#password").removeClass("border-red-500");
                $("#password_icon").removeClass("text-red-500");
                $("#password_error").addClass("hidden");
            }

            if (password !== password_confirm) {
                $("#password_confirm").addClass("border-red-500");
                $("#password_confirm_icon").addClass("text-red-500");
                $("#password_confirm_error").removeClass("hidden");
                valid = false;
            } else {
                $("#password_confirm").removeClass("border-red-500");
                $("#password_confirm_icon").removeClass("text-red-500");
                $("#password_confirm_error").addClass("hidden");
            }

            function registerUser(data) {
                var envUrl = "<?= env('API_BASE_URL'); ?>";
                var endpoint = "registration";
                var apiUrl = envUrl + endpoint;
                $.ajax({
                    type: "POST",
                    url: apiUrl,
                    data: JSON.stringify(data),
                    contentType: "application/json",
                    success: function(response) {
                        if (response.message === "Registrasi berhasil silahkan login") {
                            $("#register_success").removeClass("hidden");
                            setTimeout(function() {
                                $("#register_success").addClass("hidden");
                            }, 5000);

                            $("#email").removeClass("border-red-500");
                            $("#email_icon").removeClass("text-red-500");
                            $("#email_registered_error").addClass("hidden");

                            $("input[type='text'], input[type='password']").val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#email").addClass("border-red-500");
                        $("#email_icon").addClass("text-red-500");
                        $("#email_registered_error").removeClass("hidden");
                    }
                });
            }


            if (valid) {
                var data = {
                    email: email,
                    first_name: first_name,
                    last_name: last_name,
                    password: password
                };
                registerUser(data);
            }

        });
    </script>
</body>

</html>