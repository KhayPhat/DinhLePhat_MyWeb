<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();

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

                <table>

                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
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
                </tr>
            ';
        }

        $html .= '
                </table>

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
        return "Trang thêm category";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Lưu category thành công";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Chi tiết category: " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Sửa category: " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Cập nhật category: " . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Xóa category: " . $id;
    }
}