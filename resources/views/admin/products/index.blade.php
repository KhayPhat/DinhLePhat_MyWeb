<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Product</title>

    <style>
        body{
            font-family:Arial;
            background:#f1f5f9;
            padding:30px;
        }

        .container{
            max-width:1200px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #ccc;
            padding:10px;
        }

        th{
            background:#2563eb;
            color:white;
        }

        .btn{
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
            color:white;
        }

        .add{
            background:#16a34a;
        }

        .back{
            background:#64748b;
        }
    </style>

</head>

<body>

<div class="container">

<h1>Danh sách Product</h1>

<a href="/admin/products/create" class="btn add">
+ Thêm Product
</a>

<a href="/admin/dashboard" class="btn back">
Quay lại Dashboard
</a>

<br><br>

<table>

<tr>
    <th>ID</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Category</th>
    <th>Brand</th>
</tr>

@foreach($list as $item)

<tr>

    <td>{{ $item->id }}</td>

    <td>{{ $item->productname }}</td>

    <td>{{ $item->price }}</td>

    <td>{{ $item->category?->catename }}</td>

    <td>{{ $item->brand?->brandname }}</td>

</tr>

@endforeach

</table>

<br>

{{ $list->links() }}

</div>

</body>
</html>