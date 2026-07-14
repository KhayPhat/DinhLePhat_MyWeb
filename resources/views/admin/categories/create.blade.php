@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Thêm Category</h2>

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

    <form method="POST" action="{{ route('categories.store') }}">

        @csrf

        <div class="mb-3">

            <label>Tên danh mục</label>

            <input
                type="text"
                name="catename"
                class="form-control"
                value="{{ old('catename') }}">

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

            Thêm Category

        </button>

        <a
            href="{{ route('categories.index') }}"
            class="btn btn-secondary">

            Quay lại

        </a>

    </form>

</div>

@endsection