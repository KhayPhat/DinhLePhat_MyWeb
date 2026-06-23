<!DOCTYPE html>
<html>

<head>

    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container-fluid">

    <div class="row min-vh-100">

        <!-- Sidebar -->
        <div class="col-md-2 p-0">

            @include('admin._partials.sidebar')

        </div>

        <!-- Nội dung bên phải -->
        <div class="col-md-10 d-flex flex-column p-0">

            <!-- Header -->
            <div class="border-bottom">

                @include('admin._partials.header')

            </div>

            <!-- Nội dung -->
            <main class="flex-grow-1 bg-light p-3">

                <iframe
name="contentFrame"
style="
width:100%;
height:100%;
border:none;
min-height:700px;
"
></iframe>

            </main>

            <!-- Footer -->
            <div>

                @include('admin._partials.footer')

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>