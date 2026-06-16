<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::select(
            'id',
            'brandname',
            'slug'
)->paginate(10);
        $html = '
        <html>
        <head>
            <title>Danh sách Brand</title>

            <style>

                body{
                    font-family: Arial, sans-serif;
                    background:#f1f5f9;
                    padding:30px;
                }

                .container{
                    max-width:1000px;
                    margin:auto;
                    background:white;
                    padding:30px;
                    border-radius:15px;
                }

                h1{
                    margin-bottom:20px;
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
                    width:100%;
                    border-collapse:collapse;
                }

                th, td{
                    border:1px solid #ccc;
                    padding:10px;
                    text-align:left;
                }

                th{
                    background:#2563eb;
                    color:white;
                }

                .btn-edit{
                    background:#eab308;
                    color:white;
                    padding:6px 10px;
                    text-decoration:none;
                    border-radius:5px;
                }

                .btn-delete{
                    background:#dc2626;
                    color:white;
                    padding:6px 10px;
                    border:none;
                    border-radius:5px;
                    cursor:pointer;
                }

            </style>

        </head>

        <body>

        <div class="container">

            <h1>Danh sách Brand</h1>

            <a class="btn-add" href="/admin/brands/create">
                + Thêm Brand
            </a>
            <a class="btn-add"
   href="/admin/dashboard"
   style="background:#64748b; margin-left:10px;">

    Quay lại Dashboard

</a>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Tên Brand</th>
                    <th>Slug</th>
                    <th>Chức năng</th>
                </tr>
        ';

        foreach($brands as $item){

            $html .= '
                <tr>

                    <td>'.$item->id.'</td>

                    <td>'.$item->brandname.'</td>

                    <td>'.$item->slug.'</td>

                    <td>

                        <a class="btn-edit"
                           href="/admin/brands/'.$item->id.'/edit">

                            Sửa

                        </a>

                <form method="POST"
                    action="/admin/brands/'.$item->id.'"
                    style="display:inline-block;">

                            <input type="hidden"
                                   name="_token"
                                   value="'.csrf_token().'">

                            <input type="hidden"
                                   name="_method"
                                   value="DELETE">

                            <button type="submit"
                                    class="btn-delete">

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
        '.$brands->links()->toHtml().'
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

            <title>Thêm Brand</title>

            <style>

                body{
                    font-family: Arial, sans-serif;
                    background:#f1f5f9;
                    padding:30px;
                }

                .container{
                    max-width:700px;
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

                <h2>Thêm Brand</h2>

                <form method="POST" action="/admin/brands">

                    <input type="hidden"
                           name="_token"
                           value="'.csrf_token().'">

                    <label>Tên Brand</label>

                    <input type="text"
                           name="brandname">

                    <label>Slug</label>

                    <input type="text"
                           name="slug">

                    <button type="submit"
                            class="btn btn-save">

                        Lưu

                    </button>

                    <a href="/admin/brands"
                       class="btn btn-back">

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
    Brand::create([
        'brandname' => $request->brandname,
        'slug' => $request->slug,
        'image' => null,
        'status' => 1,
        'sort_order' => 0,
        'description' => null,
    ]);

    return redirect('/admin/brands');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return '
        <html>
        <head>

            <title>Sửa Brand</title>

            <style>

                body{
                    font-family: Arial, sans-serif;
                    background:#f1f5f9;
                    padding:30px;
                }

                .container{
                    max-width:700px;
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

                .btn-update{
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

                <h2>Sửa Brand</h2>

                <form method="POST"
                      action="/admin/brands/'.$id.'">

                    <input type="hidden"
                           name="_token"
                           value="'.csrf_token().'">

                    <input type="hidden"
                           name="_method"
                           value="PUT">

                    <label>Tên Brand</label>

                    <input type="text"
                           name="brandname"
                           value="'.$brand->brandname.'">

                    <label>Slug</label>

                    <input type="text"
                           name="slug"
                           value="'.$brand->slug.'">

                    <button type="submit"
                            class="btn btn-update">

                        Cập nhật

                    </button>

                    <a href="/admin/brands"
                       class="btn btn-back">

                        Quay lại

                    </a>

                </form>
            </div>

        </body>
        </html>
        ';
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $brand = Brand::findOrFail($id);

    $brand->update([
        'brandname' => $request->brandname,
        'slug' => $request->slug,
        'updated_at' => now()
    ]);

    return redirect('/admin/brands');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    $brand = Brand::findOrFail($id);

    $brand->delete();

    return redirect('/admin/brands');
}
}