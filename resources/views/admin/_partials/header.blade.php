<nav class="navbar navbar-light bg-light">

    <div class="container-fluid">

        <span class="navbar-brand">
            Admin Panel
        </span>

        <ul class="nav align-items-center">

            <li class="nav-item">

                <span class="nav-link">
                    Xin chào, <b>{{ Auth::user()->fullname }}</b>
                </span>

            </li>

            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('change-password') }}">

                    Đổi mật khẩu

                </a>

            </li>

            <li class="nav-item">

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-link nav-link"
                        style="text-decoration:none;">

                        Đăng xuất

                    </button>

                </form>

            </li>

        </ul>

    </div>

</nav>