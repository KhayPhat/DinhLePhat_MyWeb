@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h2>Thùng rác Category</h2>

    <x-admin.alert />

    <a href="{{ route('categories.index') }}"
       class="btn btn-secondary mb-3">

        Quay lại

    </a>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>

                <th>Tên Category</th>

                <th>Slug</th>

                <th>Ngày xóa</th>

                <th>Chức năng</th>

            </tr>

        </thead>

        <tbody>

        @forelse($categories as $item)

            <tr>

                <td>{{ $item->cateid }}</td>

                <td>{{ $item->catename }}</td>

                <td>{{ $item->slug }}</td>

                <td>{{ $item->deleted_at }}</td>

                <td>

                    <form
                        action="{{ route('categories.restore',$item->cateid) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('PUT')

                        <button
                            class="btn btn-success btn-sm">

                            Khôi phục

                        </button>

                    </form>

                    <form
                        action="{{ route('categories.forceDelete',$item->cateid) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Xóa vĩnh viễn Category này?')">

                            Xóa vĩnh viễn

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">

                    Thùng rác trống

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $categories->links() }}

</div>

@endsection