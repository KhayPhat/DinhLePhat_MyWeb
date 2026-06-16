<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select(
            'cateid',
            'catename',
            'slug',
            'image',
            'status'
)->paginate(10);
        $html = '
        <html>
        <head>
            <title>Danh sách Category</title>

            <style>
                body{
                    font-family: Arial, sans-serif;
                    background: #f1f5f9;
                    padding: 30px;
                }

                .container{
                    max-width: 1000px;
                    margin: auto;
                    background: white;
                    padding: 30px;
                    border-radius: 15px;
                }

                h1{
                    margin-bottom: 20px;
                }

                .btn-add{
                    display:inline-block;
                    padding:10px 15px;
                    background:#16a34a;
                    color:white;
                    text-decoration:none;
                    border-radius:5px;
                    margin-bottom:20px;
                }

                table{
                    width: 100%;
                    border-collapse: collapse;
                }

                th, td{
                    border: 1px solid #ccc;
                    padding: 12px;
                    text-align: left;
                }

                th{
                    background: #2563eb;
                    color: white;
                }

                tr:nth-child(even){
                    background: #f8fafc;
                }
            </style>
        </head>

        <body>

            <div class="container">

                <h1>Danh sách Category</h1>

                <a class="btn-add" href="/admin/categories/create">
                    + Thêm Category
                </a>
                <a class="btn-add"
   href="/admin/dashboard"
   style="background:#64748b; margin-left:10px;">

    Quay lại Dashboard

</a>

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
        ';

        foreach($categories as $item){

            $html .= '
                <tr>
                    <td>'.$item->cateid.'</td>
                    <td>'.$item->catename.'</td>
                    <td>'.$item->slug.'</td>
                    <td>'.$item->image.'</td>
                    <td>'.$item->status.'</td>

<td>

    <a href="/admin/categories/'.$item->cateid.'/edit"
       style="
            background:orange;
            color:white;
            padding:6px 10px;
            text-decoration:none;
            border-radius:4px;
            margin-right:5px;
       ">
        Sửa
    </a>

    <form method="POST"
          action="/admin/categories/'.$item->cateid.'"
          onsubmit="return confirm(\'Bạn có chắc muốn xóa?\')"
          style="display:inline;">

        <input type="hidden" name="_token" value="'.csrf_token().'">

        <input type="hidden" name="_method" value="DELETE">

        <button type="submit" style="
            background:red;
            color:white;
            border:none;
            padding:6px 10px;
            cursor:pointer;
            border-radius:4px;
        ">
            Xóa
        </button>

    </form>

</td>
                </tr>
            ';
        }

$html .= '
                </table>

                <div style="margin-top:20px;">
                    '.$categories->links()->toHtml().'
                </div>

            </div>

        </body>
        </html>
        ';

return $html;
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return '
    <html>
    <head>
        <title>Thêm Category</title>

        <style>
            body{
                font-family: Arial, sans-serif;
                background:#f1f5f9;
                padding:30px;
            }

            .container{
                max-width:600px;
                margin:auto;
                background:white;
                padding:30px;
                border-radius:15px;
            }

            input{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
                text-decoration:none;
                display:inline-block;
            }

            .btn-save{
                background:#2563eb;
                color:white;
            }

            .btn-back{
                background:#64748b;
                color:white;
                margin-left:10px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Thêm Category</h2>

            <form method="POST" action="/admin/categories">

                <input type="hidden" name="_token" value="'.csrf_token().'">

                <label>Tên danh mục</label>
                <input type="text" name="catename" required>

                <label>Slug</label>
                <input type="text" name="slug" required>

                <button type="submit" class="btn btn-save">
                    Lưu
                </button>

                <a href="/admin/categories" class="btn btn-back">
                    Quay lại
                </a>

            </form>

        </div>

    </body>
    </html>
    ';
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    Category::create([
        'catename' => $request->catename,
        'slug' => $request->slug,
        'image' => null,
        'status' => 1,
        'sort_order' => 0,
        'description' => null,
    ]);

    return redirect('/admin/categories');
}

    public function show(string $id)
    {
        return "Chi tiết category: " . $id;
    }

public function edit(string $id)
{
    $category = Category::findOrFail($id);

    return '
    <html>
    <head>
        <title>Sửa Category</title>

        <style>
            body{
                font-family: Arial, sans-serif;
                background:#f1f5f9;
                padding:30px;
            }

            .container{
                max-width:600px;
                margin:auto;
                background:white;
                padding:30px;
                border-radius:15px;
            }

            input{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
                text-decoration:none;
                display:inline-block;
            }

            .btn-save{
                background:#2563eb;
                color:white;
            }

            .btn-back{
                background:#64748b;
                color:white;
                margin-left:10px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Sửa Category</h2>

            <form method="POST" action="/admin/categories/'.$id.'">

                <input type="hidden" name="_token" value="'.csrf_token().'">
                <input type="hidden" name="_method" value="PUT">

                <label>Tên danh mục</label>
                <input type="text" name="catename" value="'.$category->catename.'" required>

                <label>Slug</label>
                <input type="text" name="slug" value="'.$category->slug.'" required>

                <button type="submit" class="btn btn-save">
                    Cập nhật
                </button>

                <a href="/admin/categories" class="btn btn-back">
                    Quay lại
                </a>

            </form>

        </div>

    </body>
    </html>
    ';
}

public function update(Request $request, string $id)
{
    $category = Category::findOrFail($id);

    $category->update([
        'catename' => $request->catename,
        'slug' => $request->slug,
        'updated_at' => now()
    ]);

    return redirect('/admin/categories');
}

public function destroy(string $id)
{
    $category = Category::findOrFail($id);

    $category->delete();

    return redirect('/admin/categories');
}
}