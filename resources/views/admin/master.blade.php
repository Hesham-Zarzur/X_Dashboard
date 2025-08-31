<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Sidebar collapsed state */
        .sidebar-collapsed {
            @apply w-16 transition-all duration-1000 ease-in-out;
        }

        .sidebar-collapsed .sidebar-text {
            @apply hidden;
        }

        .sidebar-collapsed .sidebar-logo-text {
            @apply hidden;
        }

        /* Mobile sidebar */
        @media (max-width: 768px) {
            .sidebar-menu {
                @apply transform -translate-x-full transition-transform duration-1000 ease-in-out w-64 fixed top-0 left-0 z-50;
            }

            .sidebar-menu.open {
                @apply translate-x-0;
            }
        }
    </style>
</head>

<body class="   min-h-screen flex flex-col">
    <!-- Mobile Menu Toggle Button -->
    <div class="md:hidden fixed top-4 left-4 z-50">
        <button id="mobile-menu-button"
            class="p-2 rounded-md text-primary bg-base-300 focus:outline-none focus:ring-2 focus">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="sidebar-menu sidebar-collapsed fixed top-0 left-0 z-40 h-screen bg-base-100  text-gray shadow-2xl transition-all duration-1000 ease-in-out md:translate-x-0 group hover:w-64 ">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 border-b border-primary-600">
            <i class="bi bi-twitter-x  font-bold text-2xl"></i>
            <h1 class="text-2xl font-bold sidebar-logo-text group-hover:inline hidden">Dashboard</h1>
        </div>

        <!-- User Profile -->
        <div class="p-4 ">
            <div class="flex items-center">
                <div class="relative flex justify-center">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=ccc&color=000" alt="Profile"
                        title="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full">
                    <span
                        class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></span>
                </div>
                <div class="ml-3 sidebar-text group-hover:block hidden">
                    <h3 class="text-sm font-medium">{{ Auth::user()->name }}</h3>

                    <p class="text-xs text-gray-300">{{ Auth::user()->role }}</p>

                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-4 px-2">
            <div class="space-y-1">
                <!-- Dashboard Link -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200 
                    {{ Route::currentRouteName() === 'admin.dashboard' ? 'text-primary bg-base-300 ' : 'text-gray-300 hover:bg-base-200' }} ">
                    <i class="ms-2 bi bi-speedometer2 text-lg text-center"></i>
                    <span class="ml-3 sidebar-text group-hover:inline hidden">Dashboard</span>
                </a>

                <!-- Users Link -->
                <a href="{{ route('admin.users.list') }}"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200
                    {{ Route::currentRouteName() === 'admin.users.list' || Route::currentRouteName() === 'admin.users.create' || Route::currentRouteName() === 'admin.users.edit' ? 'text-primary bg-base-300 ' : 'text-gray-300 hover:bg-base-200 ' }}">
                    <i class="ms-2 bi bi-people text-lg text-center"></i>
                    <span class="ml-3 sidebar-text group-hover:inline hidden">Users</span>
                </a>

                <!-- Products Link -->
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200
                    {{ Route::currentRouteName() === 'admin.products' ? 'text-primary bg-base-300 ' : 'text-gray-300 hover:bg-base-200' }}">
                    <i class="ms-2 bi bi-box text-lg text-center"></i>
                    <span class="ml-3 sidebar-text group-hover:inline hidden">Products</span>
                </a>

                <!-- Orders Link -->
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200
                    {{ Route::currentRouteName() === 'admin.orders' ? 'text-primary bg-base-300 ' : 'text-gray-300 hover:bg-base-200' }}">
                    <i class="ms-2 bi bi-cart text-lg text-center"></i>
                    <span class="ml-3 sidebar-text group-hover:inline hidden">Orders</span>
                </a>

                <!-- Settings Link -->
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors duration-200
                    {{ Route::currentRouteName() === 'admin.settings' ? 'text-primary bg-base-300 ' : 'text-gray-300 hover:bg-base-200' }}">
                    <i class="ms-2 bi bi-gear text-lg text-center"></i>
                    <span class="ml-3 sidebar-text group-hover:inline hidden">Settings</span>
                </a>
            </div>
        </nav>

        <!-- Logout Button -->
        <div class="absolute bottom-0 w-full p-2 border-t border-primary-600">
            <a href="{{ route('logout') }}" method="get"
                class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-primary-800 hover:text-white transition-colors duration-200">
                <i class="bi bi-box-arrow-left text-lg"></i>
                <span class="ml-3 sidebar-text group-hover:inline hidden">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Header -->
    <header class="shadow-sm ">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold ">@yield('header', 'Page Title')</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main
        class="flex-1 md:ml-16 transition-all duration-1000 ease-in-out group-hover:md:ml-64 bg-base-300 text-base-100">

        <!-- Page Content -->
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class=" shadow-inner mt-auto bg-base-300 text-base-100 hover:text-white ">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm ">
                    &copy; @php echo date('Y') @endphp Dashboard. All rights reserved.
                </div>
                <div class="mt-2 md:mt-0 text-sm ">
                    Developed by <span class="text-primary-600 font-medium">HESHAM.<span
                            class="text-primary">DEV</span></span>
                </div>
            </div>
        </div>
    </footer>


    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');

            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                // Prevent scrolling when sidebar is open on mobile
                if (sidebar.classList.contains('open')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 768 &&
                    !sidebar.contains(event.target) &&
                    !mobileMenuButton.contains(event.target) &&
                    sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('open');
                }
            });
        });
    </script>
</body>

</html>
