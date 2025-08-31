@extends('admin.master')
@section('title', 'Users')
@section('header', 'Users')
@section('content')
    <div class="app container page ">
        <div class="page-head">
            <div class="breadcrumbs">
                <ul class="">
                    {{-- <li class="" aria-current="page">Users</li> --}}
                    {{-- <li class="breadcrumbs-separator "> \ </li> --}}
                </ul>
            </div>
        </div>
        <div class="page-body">

            <div class="card mt-4">
                <div class="card-header">
                    <div class="flex justify-between  px-6">
                        <h1 class="text-2xl font-semibold">Users List</h1>
                        <a href="{{ route('admin.users.create') }}"
                            class=" px-4 py-2 rounded-md btn btn-primary btn-outline">
                            Add User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="w-full overflow-x-auto">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-start text-secondary text-lg text-bold">#</th>
                                    <th class="text-secondary text-lg text-bold">Name</th>
                                    <th class="text-secondary text-lg text-bold">Email</th>
                                    <th class="text-secondary text-lg text-bold">Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="row-hover text-center">
                                        <td class="text-start font-mono">{{ $user->code }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
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
                    </div>
                    <div class="text-center text-bold mt-10">No more users</div>
                </div>
            </div>
        </div>
    </div>



@endsection
