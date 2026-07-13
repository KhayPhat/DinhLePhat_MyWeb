@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Thêm Product</h2>

    <x-admin.alert />

    <form method="POST"
          action="{{ route('products.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Tên sản phẩm</label>

            <input
                type="text"
                name="productname"
                class="form-control"
                value="{{ old('productname') }}">

        </div>

        <div class="mb-3">

            <label>Giá</label>

            <input
                type="number"
                name="price"
                class="form-control"
                value="{{ old('price') }}">

        </div>

        <div class="mb-3">

            <label>Category</label>

            <select
                name="cateid"
                class="form-control">

                @foreach($categories as $cate)

                    <option value="{{ $cate->cateid }}">

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

                    <option value="{{ $brand->id }}">

                        {{ $brand->brandname }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Ảnh đại diện --}}
        <div class="mb-3">

            <label>Hình ảnh đại diện</label>

            <input
                type="file"
                name="img"
                class="form-control">

        </div>

        {{-- Ảnh phụ --}}
        <div class="mb-3">

            <label>Hình ảnh phụ</label>

            <input
                type="file"
                name="imgs[]"
                class="form-control"
                multiple>

        </div>

        <button
            type="submit"
            class="btn btn-primary">

            Thêm Product

        </button>

        <a href="{{ route('products.index') }}"
           class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection