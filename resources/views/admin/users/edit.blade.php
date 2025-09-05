@extends('admin.master', ['assets' => ['jqv', 'notyf']])
@section('title', $user->role . ' ' . $user->name)
@section('header', content: 'Profile')
@section('content')
    <div id="app" class=" container page ">
        <div class="page-head mb-3">
            <div class="breadcrumbs">
                <ul class="text-lg ">
                    <li class="text-base"><a href="{{ route('admin.users.list') }}">Users list</a></li>
                    <li class="breadcrumbs-separator "> \ </li>
                    <li class="" aria-current="page">{{ $user->name }} profile</li>
                </ul>
            </div>
            <div class="card ">
                @if ($errors->any())
                    <div class="card-head">
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger text-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
            </div>
        </div>
    </div>
    <div class="page-body">

        <div class="flex p-8 gap-4">
            <div class="w-1/3">
                <div class="card ">
                    <div class="card-head ">
                        <h3 class=" font-semibold m-4 "><i class="bi bi-info-circle-fill font-mediam me-2"></i>User
                            Information
                        </h3>
                        <div class="w-full text-center">
                            <div class="relative flex justify-center ">
                                @if ($user->role == 'Admin')
                                    <img src="https://ui-avatars.com/api/?name=Admin&background=ccc&color=000"
                                        alt="Profile" title="{{ $user->name }}" class="w-25 h-25 rounded-full">
                                @else
                                    <img src="https://ui-avatars.com/api/?name=Cashier&background=ccc&color=000"
                                        alt="Profile" title="{{ $user->name }}" class="w-25 h-25 rounded-full">
                                @endif
                            </div>
                        </div>
                        <h3 class="text-center font-semibold m-4 mb-0 ">{{ $user->name }}</h3>
                        <p class="text-center"></p>
                        <div class="divider">{{ $user->code }}</div>
                    </div>
                    <div class="card-body">
                        <div class=" font-small">
                            <p class="font-mono"><i class="bi bi-envelope-fill me-2"></i>{{ $user->email }}</p>
                            <p class="font-mono"><i class="bi bi-phone-fill me-2"></i>{{ $user->mobile }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-2/3">
                {{-- User Update --}}
                <div class="card  mb-3">
                    <div class="card-head">
                        <div class="flex justify-between pt-4 px-4">
                            <h1 class="font-semibold text-xl">Update User</h1>
                            <button class="btn btn-success btn-outline  rounded-md" type="submit"
                                form="update">Update</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="w-full">
                            <form id="update" method="POST" action="{{ route('admin.users.update') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="code" value="{{ $user->code }}">
                                <div class="columns-2">
                                    <div class="form-group mb-4">
                                        <label for="name" class="label text-bold">Full Name</label>
                                        <input id="name" name="name" value="{{ $user->name }}" type="text"
                                            class="input " maxlength="250" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="mobile" class="label text-bold">Mobile Number</label>
                                        <input id="mobile" name="mobile" value="{{ $user->mobile }}" type="tel"
                                            class="input " maxlength="11" min="11" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="email" class="label text-bold">Email Address</label>
                                    <input id="email" name="email" value="{{ $user->email }}" type="email"
                                        class="input " maxlength="124" required>
                                </div>
                                <div class="columns-2">
                                    <div class="form-group mb-4">
                                        <label for="password" class="label text-bold">New Password</label>
                                        <input id="password" name="password" type="password" class="input " maxlength="24">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="confirmPassword" class="label text-bold">Confirm Password </label>
                                        <input id="confirmPassword" name="confirmPassword" type="password" class="input ">
                                    </div>
                                </div>
                                <div class="select-floating mb-4">
                                    <select id="role" class="form-select border rounded-md w-full ps-5 py-3 "
                                        name="role" disabled>
                                        <option value="Admin" @selected($user->role == 'Admin' || $user->role == 'admin')>Admin</option>
                                        <option value="Cashier" @selected($user->role == 'Cashier' || $user->role == 'cashier')>Cashier</option>
                                    </select>
                                    <label class="select-floating-label  text-muted" for="role">role</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card animate-pulse">
                    <div class="card-header">

                    </div>

                    <div class="card-body">

                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

@endsection
@section('scripts')
    @if (session('success'))
        <script>
            $(document).ready(function() {
                const notyf = new Notyf({
                    duration: 5000,

                });

                notyf.success(@json(session('success')));

            });
        </script>
    @endif
    @vite('resources/js/vue.js')
    <script type="module">
        createApp({
            el: '#app',
            data() {
                return {


                }
            },
            methods: {

            },
            mounted() {},

        }).mount('#app')
    </script>
@endsection
