@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h1>Danh sách Product</h1>

    <x-admin.alert />

    <a href="/admin/products/create" class="btn btn-success"">
        + Thêm Product
    </a>

    <a href="/admin/dashboard" class="btn btn-secondary"">
        Quay lại Dashboard
    </a>

    <br><br>

    <table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Hình ảnh</th>
        <th>Chức năng</th>
    </tr>

    @foreach($products as $item)

    <tr>

        <td>{{ $item->id }}</td>

        <td>{{ $item->productname }}</td>

        <td>{{ $item->price }}</td>

        <td>{{ $item->category?->catename }}</td>

        <td>{{ $item->brand?->brandname }}</td>

        <td>

            @foreach($item->images as $img)

                <img
                    src="{{ asset('storage/'.$img->image) }}"
                    width="80"
                    class="me-2 rounded">

            @endforeach

        </td>

        <td>

            <a
                href="{{ route('products.edit',$item->id) }}"
                class="btn btn-warning btn-sm">

                Sửa

            </a>

            <form
                action="{{ route('products.destroy',$item->id) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Xóa sản phẩm?')">

                    Xóa

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

    <br>

    {{ $products->links() }}

</div>

@endsection