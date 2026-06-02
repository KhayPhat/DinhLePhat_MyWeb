<div class="admin-sidebar bg-dark text-white p-3 vh-100">

    <h4 class="mb-4">
        Admin
    </h4>

    <ul class="nav flex-column">

        <!-- DASHBOARD -->
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.home') }}">
                Dashboard
            </a>
        </li>

        <!-- CATEGORY -->
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
                           href="{{ route('categories.index') }}">

                            Danh sách loại sản phẩm

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('categories.create') }}">

                            Thêm loại sản phẩm

                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <!-- BRAND -->
        <li class="nav-item">

            <a class="nav-link text-white"
               data-bs-toggle="collapse"
               href="#brandMenu">

                Quản lý Brand

            </a>

            <div class="collapse" id="brandMenu">

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('brands.index') }}">

                            Danh sách Brand

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('brands.create') }}">

                            Thêm Brand

                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <!-- USER -->
        <li class="nav-item">

            <a class="nav-link text-white"
               data-bs-toggle="collapse"
               href="#userMenu">

                Quản lý User

            </a>

            <div class="collapse" id="userMenu">

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('users.index') }}">

                            Danh sách User

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('users.create') }}">

                            Thêm User

                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <!-- PRODUCT -->
        <li class="nav-item">

            <a class="nav-link text-white"
               data-bs-toggle="collapse"
               href="#productMenu">

                Quản lý Product

            </a>

            <div class="collapse" id="productMenu">

                <ul class="nav flex-column ms-3">

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('products.index') }}">

                            Danh sách Product

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('products.create') }}">

                            Thêm Product

                        </a>
                    </li>

                </ul>

            </div>

        </li>

    </ul>

</div>