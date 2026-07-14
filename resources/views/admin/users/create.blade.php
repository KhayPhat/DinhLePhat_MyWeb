@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Thêm User</h2>

    <x-admin.alert />

    <form method="POST"
          action="{{ route('users.store') }}">

        @csrf

        <div class="mb-3">

            <label>Họ tên</label>

            <input
                type="text"
                name="fullname"
                class="form-control"
                value="{{ old('fullname') }}">

        </div>

        <div class="mb-3">

            <label>Username</label>

            <input
                type="text"
                name="username"
                class="form-control"
                value="{{ old('username') }}">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}">

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input
                type="password"
                name="password"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Phone</label>

            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone') }}">

        </div>

        <button
            class="btn btn-primary">

            Thêm User

        </button>

        <a
            href="{{ route('users.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection