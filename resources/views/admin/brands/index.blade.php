@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h1>Danh sách Brand</h1>

    <x-admin.alert />

    <a href="{{ route('brands.create') }}" class="btn btn-success">
        + Thêm Brand
    </a>

    <a href="/admin/dashboard" class="btn btn-secondary">
        Quay lại Dashboard
    </a>

    <br><br>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Tên Brand</th>
            <th>Slug</th>
            <th>Chức năng</th>
        </tr>

        @foreach($brands as $item)

        <tr>

            <td>{{ $item->id }}</td>

            <td>{{ $item->brandname }}</td>

            <td>{{ $item->slug }}</td>

            <td>

                <a
                    href="{{ route('brands.edit',$item->id) }}"
                    class="btn btn-warning btn-sm">

                    Sửa

                </a>

                <form
                    action="{{ route('brands.destroy',$item->id) }}"
                    method="POST"
                    style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Xóa Brand?')">

                        Xóa

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

    {{ $brands->links() }}

</div>

@endsection