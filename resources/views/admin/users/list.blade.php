@extends('admin.master', ['assets' => ['jqv', 'notyf']])
@section('title', 'Users')
@section('header', 'Users')
@section('content')
    <div id="app" class=" container page ">
        <div class="page-head">
            <div class="breadcrumbs">
                <ul class="">
                    {{-- <li class="" aria-current="page">Users</li> --}}
                    {{-- <li class="breadcrumbs-separator "> \ </li> --}}
                </ul>
            </div>
        </div>
        <div class="page-body text-base-200">

            <div class="card mb-10">
                <div class="card-body">
                    <div class="flex justify-between  px-6">
                        <h1 class="text-2xl card-title  select-none">Users List</h1>
                        <a href="{{ route('admin.users.create') }}" class=" px-4 py-2 rounded-md btn btn-primary btn-soft">
                            Add User
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4 ">
                {{-- Admin List --}}
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-2xl card-title select-none">Admin Users</h1>
                    </div>
                    <div class="card-body">
                        @if (count($users) == 1)
                            <div class="text-center font-semibold text-xl mt-4 select-none">No Admin users Found Only You
                            </div>
                        @else
                            <div class="w-full overflow-x-auto">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-secondary  text-bold select-none">Name</th>
                                            <th class="text-secondary  text-bold select-none">mobile</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users->where('role', 'Admin') as $user)
                                            @if ($user->code != Auth::user()->code)
                                                <tr class="row-hover text-center">
                                                    <td>{{ $user->name }}</td>
                                                    <td class="font-mono">{{ $user->mobile }}</td>
                                                    <td class="select-none">
                                                        <a href="{{ route('admin.users.edit', $user->code) }}"
                                                            class="btn btn-info btn-soft btn-outline bi bi-eye-fill me-2 "
                                                            title="{{ $user->name }} profile"></a>
                                                        <button class="btn btn-error btn-outline btn-soft"
                                                            title="delete"><span class="bi bi-trash-fill "></span></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="text-center font-semibold text-secondary mt-10 select-none">No more Admin users
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                {{-- cashier list --}}
                <div class="card ">
                    <div class="card-header">
                        <h1 class="text-2xl card-title select-none">Cashier Users</h1>
                    </div>
                    <div class="card-body">
                        @if (count($users->where('role', 'Cashier')) == 0)
                            <div class="text-center font-semibold text-xl mt-4 select-none">No Cashier users Found
                            </div>
                        @else
                            <div class="w-full overflow-x-auto">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-start text-secondary text-bold select-none">#</th>
                                            <th class="text-secondary text-bold select-none">Name</th>
                                            <th class="text-secondary text-bold select-none">mobile</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users->where('role', 'Cashier') as $user)
                                            <tr class="row-hover text-center">
                                                <td class="text-start font-mono">{{ $user->code }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td class="font-mono">{{ $user->mobile }}</td>
                                                <td class="select-none">
                                                    <a href="{{ route('admin.users.edit', $user->code) }}"
                                                        class="btn btn-info btn-soft btn-outline bi bi-eye-fill me-2 "
                                                        title="{{ $user->name }} profile"></a>
                                                    <button class="btn btn-error btn-outline btn-soft" title="delete"><span
                                                            class="bi bi-trash-fill "></span></button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="text-center font-semibold text-secondary mt-10 select-none">No more Cashier
                                    users</div>
                            </div>
                        @endif

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
                    users: [],
                    user: {},
                    usersCount: {{ count($users) }},
                    admin: {{ Auth::user()->role == 'Admin' }},


                }
            },
            methods: {

            },
            mounted() {
                this.users = {{ $users }}
                this.user = {{ Auth::user() }}
                this.usersCount = {{ count($users) }}
                this.admin = {{ Auth::user()->role == 'Admin' }}
            },

        }).mount('#app')
    </script>
@endsection
