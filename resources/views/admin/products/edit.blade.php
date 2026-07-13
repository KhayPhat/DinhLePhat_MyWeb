@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Sửa Product</h2>

    <x-admin.alert />

    <form method="POST" action="{{ route('products.update',$product->id) }}">

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

        <button class="btn btn-primary">
            Cập nhật Product
        </button>

        <a href="{{ route('products.index') }}"
           class="btn btn-secondary">
            Quay lại
        </a>

    </form>

</div>

@endsection