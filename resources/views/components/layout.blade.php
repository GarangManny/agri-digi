<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('images/Screenshot 2024-07-17 200641.png') }}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            amazon: "#ff9900",
                        },
                    },
                },
            };
        </script>
        <title>Agri-Digi | together with you</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/">
                <img class="w-24" src="{{ asset('images/Screenshot 2024-07-17 200641.png') }}" alt="" class="logo" />
            </a>

            <div class="hidden md:flex items-center space-x-6">
                <a href="/#" class="text-black hover:text-blue-300 transition duration-300">About</a>
                <a href="/#" class="text-black hover:text-blue-300 transition duration-300">Services</a>
                <a href="/#" class="text-black hover:text-blue-300 transition duration-300">Contact</a>
            </div>

            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
            </ul>
        </nav>
        <main>
            {{$slot}}
        </main>
        <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-black h-24 mt-24 opacity-90 md:justify-center"
    >
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>

    </footer>
</body>
</html>