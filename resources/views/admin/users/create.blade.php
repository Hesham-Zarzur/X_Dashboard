@extends('admin.master')
@section('title', 'Create User')
@section('header', 'Users')
@section('content')
    <div class="app container page ">
        <div class="page-head mb-3">
            <div class="card ">
                <div class="card-body">
                    <div class="flex justify-between ">
                        <div class="breadcrumbs">
                            <ul class="text-lg">
                                <li class="text-base"><a href="{{ route('admin.users.list') }}">Users</a></li>
                                <li class="breadcrumbs-separator "> \ </li>
                                <li class="" aria-current="page">Create user</li>
                            </ul>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.users.list') }}" class=" px-4 py-2 rounded-md btn btn-error btn-soft">
                                Cancel
                            </a>
                            <button class="btn btn-success btn-soft rounded-md" type="submit"
                                form="add">Create</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">

        <div class="card ">
            <div class="card-header">

                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <form id="add" method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    @method('POST')
                    <div class="columns-2  gap-3">
                        <div class="form-group mb-4">
                            <label for="name" class="label text-bold">Full Name</label>
                            <input id="name" name="name" value="{{ old('name') }}" type="text" class="input"
                                maxlength="250" required autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <label for="mobile" class="label text-bold">Mobile Number</label>
                            <input id="mobile" name="mobile" value="{{ old('mobile') }}" type="tel" class="input"
                                maxlength="11" min="11" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="label text-bold">Email Address</label>
                        <input id="email" name="email" value="{{ old('email') }}" type="email" class="input"
                            maxlength="124" required>
                    </div>

                    <div class="columns-2  gap-3">
                        <div class="form-group mb-4">
                            <label for="password" class="label text-bold">Password</label>
                            <input id="password" name="password" value="{{ old('password') }}" type="password"
                                class="input" maxlength="11" min="11" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="confirmPassword" class="label text-bold">Confirm Password </label>
                            <input id="confirmPassword" name="confirmPassword" type="password" class="input" required>
                        </div>
                    </div>
                    <div class="select-floating mb-4">
                        <select id="role" class="form-select border rounded-md w-full ps-5 py-3 " name="role"
                            required>
                            <option value="Admin">Admin</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                        <label class="select-floating-label text-muted" for="role">role</label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

@endsection
