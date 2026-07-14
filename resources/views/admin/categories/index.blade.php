@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h1>Danh sách Category</h1>

    <x-admin.alert />

    <a href="{{ route('categories.create') }}" class="btn btn-success">
        + Thêm Category
    </a>

    <a href="{{ route('admin.home') }}" class="btn btn-secondary">
        Quay lại Dashboard
    </a>

    <br><br>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>

                <th>Tên danh mục</th>

                <th>Slug</th>

                <th>Hình ảnh</th>

                <th>Trạng thái</th>

                <th>Chức năng</th>

            </tr>

        </thead>

        <tbody>

        @foreach($categories as $item)

            <tr>

                <td>{{ $item->cateid }}</td>

                <td>{{ $item->catename }}</td>

                <td>{{ $item->slug }}</td>

                <td>{{ $item->image }}</td>

                <td>{{ $item->status }}</td>

                <td>

                    <a
                        href="{{ route('categories.edit',$item->cateid) }}"
                        class="btn btn-warning btn-sm">

                        Sửa

                    </a>

                    <form
                        action="{{ route('categories.destroy',$item->cateid) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc muốn xóa?')">

                            Xóa

                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $categories->links() }}

</div>

@endsection