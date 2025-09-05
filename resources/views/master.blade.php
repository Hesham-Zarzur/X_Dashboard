<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- JQVMap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <style>
        .sidebar-transition {
            transition: width 0.3s ease-in-out;
        }

        .mobile-sidebar-enter {
            transform: translateX(-100%);
            opacity: 0;
        }

        .mobile-sidebar-enter-active {
            transform: translateX(0);
            opacity: 1;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .mobile-sidebar-exit {
            transform: translateX(0);
            opacity: 1;
        }

        .mobile-sidebar-exit-active {
            transform: translateX(-100%);
            opacity: 0;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .label-transition {
            transition: opacity 0.15s ease-in-out;
        }

        .link-hover:hover .link-text {
            transform: translateX(4px);
        }

        .link-text {
            transition: transform 0.15s ease-in-out;
        }
    </style>
</head>

<body class="h-full bg-gray-100 dark:bg-neutral-800">
    <div
        class="mx-auto flex w-full  flex-1 flex-col overflow-hidden rounded-md border border-neutral-200 bg-gray-100 md:flex-row dark:border-neutral-700 dark:bg-neutral-800 h-screen">
        <!-- Desktop Sidebar -->
        <div id="desktop-sidebar"
            class="h-full px-4 py-4 hidden md:flex md:flex-col bg-neutral-100 dark:bg-neutral-800 sidebar-transition shrink-0"
            style="width: 60px">
            <div class="flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
                <!-- Logo -->
                <a href="#"
                    class="relative z-20 flex items-center space-x-2 py-1 text-sm font-normal text-black mb-8">
                    <div
                        class="h-5 w-6 shrink-0 rounded-tl-lg rounded-tr-sm rounded-br-lg rounded-bl-sm bg-black dark:bg-white">
                    </div>
                    <span id="logo-text" class="font-medium whitespace-pre text-black dark:text-white label-transition"
                        style="opacity: 0">Acet Labs</span>
                </a>

                <!-- Navigation Links -->
                <div class="flex flex-col gap-2">
                    <a href="#" class="flex items-center justify-start gap-2 group py-2 link-hover">
                        <span
                            class="text-neutral-700 dark:text-neutral-200 text-sm link-text whitespace-pre label-transition"
                            style="opacity: 0">Dashboard</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-2 group py-2 link-hover">
                        <svg class="h-5 w-5 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span
                            class="text-neutral-700 dark:text-neutral-200 text-sm link-text whitespace-pre label-transition"
                            style="opacity: 0">Profile</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-2 group py-2 link-hover">
                        <svg class="h-5 w-5 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span
                            class="text-neutral-700 dark:text-neutral-200 text-sm link-text whitespace-pre label-transition"
                            style="opacity: 0">Settings</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-2 group py-2 link-hover">
                        <svg class="h-5 w-5 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span
                            class="text-neutral-700 dark:text-neutral-200 text-sm link-text whitespace-pre label-transition"
                            style="opacity: 0">Logout</span>
                    </a>
                </div>
            </div>

            <!-- User Profile -->
            <div class="mt-auto">
                <a href="#" class="flex items-center justify-start gap-2 group py-2 link-hover">
                    <img src="https://assets.aceternity.com/manu.png" class="h-7 w-7 shrink-0 rounded-full"
                        alt="Avatar" />
                    <span
                        class="text-neutral-700 dark:text-neutral-200 text-sm link-text whitespace-pre label-transition"
                        style="opacity: 0">Manu Arora</span>
                </a>
            </div>
        </div>

        <!-- Mobile Header -->
        <div
            class="h-10 px-4 py-4 flex flex-row md:hidden items-center justify-between bg-neutral-100 dark:bg-neutral-800 w-full">
            <div class="flex justify-end z-20 w-full">
                <button id="mobile-menu-btn" title="Open mobile menu" class="text-neutral-800 dark:text-neutral-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div id="mobile-sidebar"
            class="fixed h-full w-full inset-0 bg-white dark:bg-neutral-900 p-10 z-[100] flex-col justify-between mobile-sidebar-enter hidden">
            <button id="mobile-close-btn" class="absolute right-10 top-10 z-50 text-neutral-800 dark:text-neutral-200"
                title="Close mobile menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <div class="flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
                <!-- Mobile Logo -->
                <a href="#"
                    class="relative z-20 flex items-center space-x-2 py-1 text-sm font-normal text-black mb-8">
                    <div
                        class="h-5 w-6 shrink-0 rounded-tl-lg rounded-tr-sm rounded-br-lg rounded-bl-sm bg-black dark:bg-white">
                    </div>
                    <span class="font-medium whitespace-pre text-black dark:text-white">Acet Labs</span>
                </a>

                <!-- Mobile Navigation Links -->
                <div class="flex flex-col gap-4">
                    <a href="#" class="flex items-center justify-start gap-4 group py-3 text-lg">
                        <svg class="h-6 w-6 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        <span class="text-neutral-700 dark:text-neutral-200">Dashboard</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-4 group py-3 text-lg">
                        <svg class="h-6 w-6 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-neutral-700 dark:text-neutral-200">Profile</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-4 group py-3 text-lg">
                        <svg class="h-6 w-6 shrink-0 text-neutral-700 dark:text-neutral-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-neutral-700 dark:text-neutral-200">Settings</span>
                    </a>

                    <a href="#" class="flex items-center justify-start gap-4 group py-3 text-lg">
                        <span class="text-neutral-700 dark:text-neutral-200">Logout</span>
                    </a>
                </div>
            </div>

            <!-- Mobile User Profile -->
            <div class="mt-auto">
                <a href="#" class="flex items-center justify-start gap-4 group py-3">
                    <img src="https://assets.aceternity.com/manu.png" class="h-8 w-8 shrink-0 rounded-full"
                        alt="Avatar" />
                    <span class="text-neutral-700 dark:text-neutral-200 text-lg">Manu Arora</span>
                </a>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="flex flex-1">
            <div
                class="flex h-full w-full flex-1 flex-col gap-2 rounded-tl-2xl border border-neutral-200 bg-white p-2 md:p-10 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex gap-2">
                    <div class="h-20 w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                    <div class="h-20 w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                    <div class="h-20 w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                    <div class="h-20 w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                </div>
                <div class="flex flex-1 gap-2">
                    <div class="h-full w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                    <div class="h-full w-full animate-pulse rounded-lg bg-gray-100 dark:bg-neutral-800"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar state management
        let sidebarOpen = false;
        let mobileSidebarOpen = false;

        // Get DOM elements
        const desktopSidebar = document.getElementById("desktop-sidebar");
        const mobileSidebar = document.getElementById("mobile-sidebar");
        const mobileMenuBtn = document.getElementById("mobile-menu-btn");
        const mobileCloseBtn = document.getElementById("mobile-close-btn");
        const logoText = document.getElementById("logo-text");
        const labelElements = document.querySelectorAll(".label-transition");

        // Desktop sidebar hover functionality
        desktopSidebar.addEventListener("mouseenter", () => {
            sidebarOpen = true;
            desktopSidebar.style.width = "300px";

            // Show labels with delay
            setTimeout(() => {
                labelElements.forEach((el) => {
                    el.style.opacity = "1";
                });
            }, 150);
        });

        desktopSidebar.addEventListener("mouseleave", () => {
            sidebarOpen = false;
            desktopSidebar.style.width = "60px";

            // Hide labels immediately
            labelElements.forEach((el) => {
                el.style.opacity = "0";
            });
        });

        // Mobile sidebar functionality
        mobileMenuBtn.addEventListener("click", () => {
            mobileSidebarOpen = true;
            mobileSidebar.classList.remove("hidden");
            mobileSidebar.classList.add("flex");
            mobileSidebar.classList.remove("mobile-sidebar-enter");
            mobileSidebar.classList.add("mobile-sidebar-enter-active");
        });

        mobileCloseBtn.addEventListener("click", () => {
            mobileSidebarOpen = false;
            mobileSidebar.classList.remove("mobile-sidebar-enter-active");
            mobileSidebar.classList.add("mobile-sidebar-exit-active");

            setTimeout(() => {
                mobileSidebar.classList.add("hidden");
                mobileSidebar.classList.remove("flex");
                mobileSidebar.classList.remove("mobile-sidebar-exit-active");
                mobileSidebar.classList.add("mobile-sidebar-enter");
            }, 300);
        });

        // Close mobile sidebar when clicking outside
        mobileSidebar.addEventListener("click", (e) => {
            if (e.target === mobileSidebar) {
                mobileCloseBtn.click();
            }
        });

        // Dark mode toggle (optional)
        function toggleDarkMode() {
            document.documentElement.classList.toggle("dark");
        }

        // Add keyboard support
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && mobileSidebarOpen) {
                mobileCloseBtn.click();
            }
        });
    </script>


    // JQVMap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jquery.vmap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/maps/jquery.vmap.world.js"></script>
    // Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>
