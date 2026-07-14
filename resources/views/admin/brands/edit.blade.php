@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Sửa Brand</h2>

    <x-admin.alert />

    <form
        method="POST"
        action="{{ route('brands.update',$brand->id) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Tên Brand</label>

            <input
                type="text"
                name="brandname"
                class="form-control"
                value="{{ old('brandname',$brand->brandname) }}">

        </div>

        <div class="mb-3">

            <label>Slug</label>

            <input
                type="text"
                name="slug"
                class="form-control"
                value="{{ old('slug',$brand->slug) }}">

        </div>

        <button
            class="btn btn-primary">

            Cập nhật Brand

        </button>

        <a
            href="{{ route('brands.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection