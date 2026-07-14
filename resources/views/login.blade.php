<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card">

                <div class="card-header">
                    <h3 class="text-center">Đăng nhập</h3>
                </div>

                <div class="card-body">

                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif

                    <form method="POST" action="/login">

                        @csrf

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}">

                        </div>

                        <div class="mb-3">

                            <label>Mật khẩu</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control">

                        </div>

                        <div class="mb-3 form-check">

                            <input
                                type="checkbox"
                                class="form-check-input"
                                name="remember"
                                id="remember">

                            <label
                                class="form-check-label"
                                for="remember">

                                Ghi nhớ đăng nhập

                            </label>

                        </div>

                        <button
                            class="btn btn-primary w-100">

                            Đăng nhập

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>