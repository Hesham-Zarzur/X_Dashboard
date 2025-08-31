<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to XDashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-purple-600 to-blue-500 min-h-screen">
    <div class="container mx-auto px-4 h-screen flex items-center justify-center">
        <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl w-full max-w-md">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-2">XDashboard</h1>
                <p class="text-gray-200 mb-8">Wellcome back !</p>
            </div>

            <div class="space-y-6">
                <div class="flex flex-col items-center">
                    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-white text-purple-600 hover:bg-blue-650 px-8 py-3 rounded-full font-semibold transform hover:scale-105 bg-blue-650 transition duration-200 ease-in-out shadow-lg">
                            Admin Dashboard
                        </a>
                    @elseif (auth()->user()->role == 'Cashier')
                        <a href="{{ route('cashier.dashboard') }}"
                            class="bg-white text-purple-600 hover:bg-blue-650 px-8 py-3 rounded-full font-semibold transform hover:scale-105 bg-blue-650 transition duration-200 ease-in-out shadow-lg">
                            Cashier to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-white text-purple-600 hover:bg-blue-650 px-8 py-3 rounded-full font-semibold transform hover:scale-105 bg-blue-650 transition duration-200 ease-in-out shadow-lg">
                            Login
                        </a>
                    @endif
                </div>


            </div>

            <div class="mt-12 text-center">
                <div class="flex justify-center space-x-4">
                    <div class="text-white">
                        <svg class="w-8 h-8 mb-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm">Secure</p>
                    </div>
                    <div class="text-white">
                        <svg class="w-8 h-8 mb-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <p class="text-sm">Fast</p>
                    </div>
                    <div class="text-white">
                        <svg class="w-8 h-8 mb-2 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <p class="text-sm">Customizable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
