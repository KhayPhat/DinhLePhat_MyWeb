@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Sửa Product</h2>

    <x-admin.alert />

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('products.update',$product->id) }}"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Tên sản phẩm</label>

            <input
                type="text"
                name="productname"
                class="form-control"
                value="{{ old('productname',$product->productname) }}">

        </div>

        <div class="mb-3">

            <label>Giá</label>

            <input
                type="text"
                name="price"
                class="form-control"
                value="{{ old('price',$product->price) }}">

        </div>

        <div class="mb-3">

            <label>Category</label>

            <select
                name="cateid"
                class="form-control">

                @foreach($categories as $cate)

                    <option
                        value="{{ $cate->cateid }}"
                        {{ old('cateid',$product->cateid)==$cate->cateid ? 'selected' : '' }}>

                        {{ $cate->catename }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Brand</label>

            <select
                name="brandid"
                class="form-control">

                @foreach($brands as $brand)

                    <option
                        value="{{ $brand->id }}"
                        {{ old('brandid',$product->brandid)==$brand->id ? 'selected' : '' }}>

                        {{ $brand->brandname }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Ảnh đại diện hiện tại</label>

            <br>

            @if($product->image)

                <img
                    src="{{ asset('storage/'.$product->image) }}"
                    width="120"
                    class="rounded border mb-2">

            @else

                <p>Chưa có ảnh đại diện</p>

            @endif

        </div>

        <div class="mb-3">

            <label>Đổi ảnh đại diện</label>

            <input
                type="file"
                name="img"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Ảnh phụ hiện tại</label>

            <br>

            @foreach($product->images as $img)

                <img
                    src="{{ asset('storage/'.$img->image) }}"
                    width="80"
                    class="rounded border me-2 mb-2">

            @endforeach

        </div>

        <div class="mb-3">

            <label>Thêm ảnh phụ</label>

            <input
                type="file"
                name="imgs[]"
                class="form-control"
                multiple>

        </div>

        <button
            class="btn btn-primary">

            Cập nhật Product

        </button>

        <a
            href="{{ route('products.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection