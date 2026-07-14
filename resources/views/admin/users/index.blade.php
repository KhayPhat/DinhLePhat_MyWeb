@extends('admin.layouts.admin')

@section('content')

<div class="container">

    <h1>Danh sách User</h1>

    <x-admin.alert />

    <a href="{{ route('users.create') }}" class="btn btn-success">
        + Thêm User
    </a>

    <a href="{{ route('admin.home') }}" class="btn btn-secondary">
        Quay lại Dashboard
    </a>

    <br><br>

    <table class="table table-bordered">

        <thead>

        <tr>

            <th>ID</th>
            <th>Họ tên</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Status</th>
            <th>Chức năng</th>

        </tr>

        </thead>

        <tbody>

        @foreach($users as $item)

        <tr>

            <td>{{ $item->id }}</td>

            <td>{{ $item->fullname }}</td>

            <td>{{ $item->username }}</td>

            <td>{{ $item->email }}</td>

            <td>{{ $item->phone }}</td>

            <td>{{ $item->role }}</td>

            <td>{{ $item->status }}</td>

            <td>

                <a href="{{ route('users.edit',$item->id) }}"
                   class="btn btn-warning btn-sm">

                    Sửa

                </a>

                <form
                    action="{{ route('users.destroy',$item->id) }}"
                    method="POST"
                    style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Xóa User?')">

                        Xóa

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    {{ $users->links() }}

</div>

@endsection