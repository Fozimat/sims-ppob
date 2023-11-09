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
        <div class="w-1/2 p-6 bg-white ">
            <div class="text-center">
                <a href="#" class="flex items-center justify-center">
                    <img src="<?= base_url('assets/Logo.png'); ?>" class="h-8 mr-3" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SIMS PPOB</span>
                </a>
                <p class="text-gray-900 text-2xl font-bold mt-5">Masuk atau buat akun <br> untuk memulai</p>
            </div>
            <form class="mt-5 px-24 py-8" id="login-form" method="POST">
                <div class="mb-5">
                    <div class="relative">
                        <input type="text" id="email" name="email" placeholder="masukkan email anda" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i id="email_icon" class="absolute left-2 top-3 text-gray-400 fas fa-at"></i>
                        <p id="email_error" class="text-red-500 text-sm mt-2 hidden">Email wajib diisi</p>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="masukkan password" class="w-full px-3 py-2 pl-10 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                        <i id="password_icon" class="absolute left-2 top-3 text-gray-400 fa fa-lock"></i>
                        <p id="password_error" class="text-red-500 text-sm mt-2 hidden">Password wajib diisi</p>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full bg-red-500 text-white font-semibold py-2 rounded-md hover:bg-red-600 focus:outline-none">
                        Masuk
                    </button>
                    <p id="register_success" class="text-green-500 text-sm mt-2 text-center hidden">Registrasi berhasil silahkan login</p>
                    <p class="text-gray-500 text-sm mt-12 text-center">belum punya akun? registrasi <a href="<?= site_url('registration'); ?>" class="text-red-700 font-bold">di sini</a></p>

                </div>
            </form>
        </div>

        <div class="w-1/2">
            <img src="<?= base_url('assets/Illustrasi Login.png'); ?>" alt="Ilutrasi Login" class="w-full h-auto">
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#email").on("keyup", function() {
                if ($(this).val() === "") {
                    $("#email").addClass("border-red-500");
                    $("#email_icon").addClass("text-red-500");
                    $("#email_error").removeClass("hidden");
                } else {
                    $("#email").removeClass("border-red-500");
                    $("#email_icon").removeClass("text-red-500");
                    $("#email_error").addClass("hidden");
                }
            });

            $("#password").on("keyup", function() {
                if ($(this).val() === "") {
                    $("#password").addClass("border-red-500");
                    $("#password_icon").addClass("text-red-500");
                    $("#password_error").removeClass("hidden");
                } else {
                    $("#password").removeClass("border-red-500");
                    $("#password_icon").removeClass("text-red-500");
                    $("#password_error").addClass("hidden");
                }
            });

            $("#login-form").on("submit", function(event) {
                event.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                if (email === "") {
                    $("#email").addClass("border-red-500");
                    $("#email_icon").addClass("text-red-500");
                    $("#email_error").removeClass("hidden");
                } else {
                    $("#email").removeClass("border-red-500");
                    $("#email_icon").removeClass("text-red-500");
                    $("#email_error").addClass("hidden");
                }

                if (password === "") {
                    $("#password").addClass("border-red-500");
                    $("#password_icon").addClass("text-red-500");
                    $("#password_error").removeClass("hidden");
                } else {
                    $("#password").removeClass("border-red-500");
                    $("#password_icon").removeClass("text-red-500");
                    $("#password_error").addClass("hidden");
                }

                var envUrl = "<?= env('API_BASE_URL'); ?>";
                var endpoint = "login";
                var apiUrl = envUrl + endpoint;

                $.ajax({
                    type: "POST",
                    url: apiUrl,
                    data: JSON.stringify({
                        email: email,
                        password: password
                    }),
                    contentType: "application/json",
                    success: function(response) {
                        if (response.message === "Login Sukses") {
                            const token = response.data.token;
                            localStorage.setItem('token', token);
                            window.location.href = "<?= site_url('homepage'); ?>";
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#password").addClass("border-red-500");
                        $("#password_icon").addClass("text-red-500");
                        $("#password_error").removeClass("hidden");;
                        $("#password_error").text("Email atau password salah");
                    }
                });
            });
        });
    </script>
</body>

</html>