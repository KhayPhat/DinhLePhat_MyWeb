@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Đổi mật khẩu</h2>

    <x-admin.alert />

    <div class="card">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('change-password.update') }}">

                @csrf

                <div class="mb-3">

                    <label>Họ tên</label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ Auth::user()->fullname }}"
                        readonly>

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ Auth::user()->email }}"
                        readonly>

                </div>

                <div class="mb-3">

                    <label>Mật khẩu cũ</label>

                    <input
                        type="password"
                        name="old_password"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Mật khẩu mới</label>

                    <input
                        type="password"
                        name="new_password"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Xác nhận mật khẩu mới</label>

                    <input
                        type="password"
                        name="new_password_confirmation"
                        class="form-control">

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Đổi mật khẩu

                </button>

                <a href="{{ route('admin.home') }}"
                   class="btn btn-secondary">

                    Quay lại

                </a>

            </form>

        </div>

    </div>

</div>

@endsection