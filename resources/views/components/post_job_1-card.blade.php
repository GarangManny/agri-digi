@props(['listing'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon-removebg-preview.png') }}" />
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
    <title>Agri-Digi | Together with you</title>
    <style>
        .dropdown-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
    </style>
</head>
<body class="mb-48">
    <nav class="flex justify-between items-center p-4 bg-laravel text-white shadow-lg">
        <div class="flex items-center space-x-4">
            <button class="layout-menu-toggle navbar-nav align-items-xl-center d-xl-none" onclick="toggleSidebar()">
                <i class="fa fa-bars fa-lg"></i>
            </button>
            <a href="/supplierDashboard">
                <img class="w-24" src="{{ asset('images/favicon-removebg-preview.png') }}" alt="Logo" />
            </a>
        </div>
        <div class="hidden md:flex items-center space-x-6">
            <a href="/#" class="text-black hover:text-blue-300 transition duration-300">About</a>
            <a href="/#" class="text-black hover:text-blue-300 transition duration-300">Services</a>
            <a href="/#" class="text-black hover:text-blue-300 transition duration-300">Contact</a>
        </div>
        
        
        <div class="flex items-center space-x-4">
            <div class="relative">
                <button class="flex items-center space-x-2" onclick="toggleDropdown()">
                    <img src="{{ asset('images/user-image.png') }}" alt="User Image" class="w-10 h-10 rounded-full" />
                    <span class="hidden md:inline text-blue-300">{{ Auth::user()->name }}</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div id="userDropdown" class="absolute right-0 mt-2 w-auto bg-white text-black rounded-md shadow-lg hidden dropdown-content">
                    <a href="#" class="px-4 py-2 hover:bg-gray-100"><i class="fa fa-cog mr-2"></i></a>
                    <a href="{{ route('logout') }}" class="px-4 py-2 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt mr-2"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="sidebar hidden fixed inset-0 bg-gray-900 bg-opacity-75 z-50">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            <button class="text-white" onclick="toggleSidebar()"><i class="fa fa-times fa-lg"></i></button>
        </div>
        <div class="flex flex-col items-center mt-16">
            <h2 class="text-white text-2xl mb-8">Sidebar Content</h2>
            <ul class="space-y-4">
                <li><a href="#" class="text-white text-lg"><i class="fa fa-user mr-2"></i></a>
                <a href="#" class="text-white text-lg"><i class="fa fa-cog mr-2"></i></a></li>
                
                    <a href="{{ route('logout') }}" class="text-white text-lg" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt mr-2"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <main>
        {{$slot}}
    </main>
    
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-black h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights Reserved</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar) {
                sidebar.classList.toggle('hidden');
            }
        }
        
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) {
                dropdown.classList.toggle('hidden');
            }
        }

        document.addEventListener('click', function(event) {
            const isClickInside = document.querySelector('.relative').contains(event.target);
            const dropdown = document.getElementById('userDropdown');
            if (!isClickInside && dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
