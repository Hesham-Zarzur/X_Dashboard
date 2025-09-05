<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xdashdoard Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="grid grid-cols-1 gap-0 md:grid-cols-2 h-screen ">
        {{-- wellcome --}}
        <section id="wellcome" class="flex justify-center items-center bg-base-300 ">
            <div class="text-center text-primary">
                <h1 class="font-extrabold mb-2 text-4xl">Welcome Back !</h1>
                <p class="text-xl">To our <i class="bi bi-twitter-x"></i> dashdoard</p>
            </div>
        </section>

        {{-- login --}}
        <section id="login" class=" flex justify-center items-center">
            <div class="card shadow-none bg-transparent   w-2/3">
                <div class="card-header p-5">
                    <div class="flex justify-between">
                        <h3 class="font-bold text-2xl text-primary">Login</h3>
                        <button type="submit" form="loginForm" class="btn btn-primary btn-outline  ms-5">
                            Let's Go
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" id="loginForm" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group mb-4 ">
                            <label for="email" class="label text-bold  mb-3">Email
                                Address</label>
                            <input id="email" name="email" value="{{ old('name') }}" type="email"
                                class="input bg-white" required autofocus autocomplete="username">
                        </div>


                        <!-- Password -->
                        <div class="form-group mb-4">
                            <label for="password" class="label text-bold  mb-3 ">Password</label>
                            <input id="password" name="password" type="password" class="input bg-white" required
                                autocomplete="current-password">
                        </div>


                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center hover:text-primary ">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary checkbox-primary"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        {{-- <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div> --}}
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
