@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Thêm Brand</h2>

    <x-admin.alert />

    <form method="POST" action="{{ route('brands.store') }}">

        @csrf

        <div class="mb-3">

            <label>Tên Brand</label>

            <input
                type="text"
                name="brandname"
                class="form-control"
                value="{{ old('brandname') }}">

        </div>

        <div class="mb-3">

            <label>Slug</label>

            <input
                type="text"
                name="slug"
                class="form-control"
                value="{{ old('slug') }}">

        </div>

        <button
            type="submit"
            class="btn btn-primary">

            Thêm Brand

        </button>

        <a
            href="{{ route('brands.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection