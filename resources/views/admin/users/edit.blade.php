@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Sửa User</h2>

    <x-admin.alert />

    <form
        method="POST"
        action="{{ route('users.update',$user->id) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Họ tên</label>

            <input
                type="text"
                name="fullname"
                class="form-control"
                value="{{ old('fullname',$user->fullname) }}">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email',$user->email) }}">

        </div>

        <button
            class="btn btn-primary">

            Cập nhật User

        </button>

        <a
            href="{{ route('users.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection