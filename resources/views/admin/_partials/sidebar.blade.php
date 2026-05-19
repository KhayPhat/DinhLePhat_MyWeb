<div class="admin-sidebar bg-dark text-white p-3 vh-100">

    <h4 class="mb-4">
        Admin
    </h4>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.home') }}">
                Dashboard
            </a>
        </li>

        <li class="nav-item">

            <a class="nav-link text-white"
               data-bs-toggle="collapse"
               href="#categoryMenu">

                Quản lý danh mục

            </a>

            <div class="collapse" id="categoryMenu">

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('category.index') }}">

                            Danh sách loại sản phẩm

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('category.create') }}">

                            Thêm loại sản phẩm

                        </a>
                    </li>

                </ul>

            </div>

        </li>

    </ul>

</div>