<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $products = Product::with(['category', 'brand'])
                ->paginate(10);

    $html = '
    <html>
    <head>
        <title>Danh sách Product</title>

        <style>
            body{
                font-family: Arial;
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

            th, td{
                border:1px solid #ccc;
                padding:10px;
            }

            th{
                background:#2563eb;
                color:white;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h1>Danh sách Product</h1>

            <a
                href="/admin/products/create"
                style="
                    display:inline-block;
                    padding:10px 15px;
                    background:#16a34a;
                    color:white;
                    text-decoration:none;
                    border-radius:5px;
                    margin-bottom:20px;
                "
            >
                + Thêm Product
            </a>

            <a
                href="/admin/dashboard"
                style="
                    display:inline-block;
                    padding:10px 15px;
                    background:#64748b;
                    color:white;
                    text-decoration:none;
                    border-radius:5px;
                    margin-left:10px;
                    margin-bottom:20px;
                "
            >
                Quay lại Dashboard
            </a>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Chức năng</th>
                </tr>
    ';

    foreach($products as $item){

        $html .= '
            <tr>
                <td>'.$item->id.'</td>
                <td>'.$item->productname.'</td>
                <td>'.$item->price.'</td>
                <td>'.($item->category?->catename ?? '').'</td>
                <td>'.($item->brand?->brandname ?? '').'</td>
                <td>

                    <a
                        href="/admin/products/'.$item->id.'/edit"
                        style="
                            background:#eab308;
                            color:white;
                            padding:6px 10px;
                            text-decoration:none;
                            border-radius:5px;
                        "
                    >
                        Sửa
                    </a>

                    <form
                        method="POST"
                        action="/admin/products/'.$item->id.'"
                        style="display:inline-block;"
                    >

                        <input type="hidden"
                               name="_token"
                               value="'.csrf_token().'">

                        <input type="hidden"
                               name="_method"
                               value="DELETE">

                        <button
                            type="submit"
                            style="
                                background:#dc2626;
                                color:white;
                                padding:6px 10px;
                                border:none;
                                border-radius:5px;
                                cursor:pointer;
                            "
                        >
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
        '.$products->links()->toHtml().'
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
    $categories = DB::table('categories')->get();
    $brands = DB::table('brands')->get();

    $html = '
    <html>
    <head>
        <title>Thêm Product</title>

        <style>
            body{
                font-family: Arial;
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

            input, select{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                background:#2563eb;
                color:white;
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
            }
        </style>
    </head>

    <body>

        <div class="container">

<h2>Thêm Product</h2>

'.

(
session("errors")

?

'<div
style="
background:#fecaca;
color:#991b1b;
padding:12px;
margin-bottom:15px;
border-radius:8px;
"
>

'

.implode(
'<br>',
session("errors")->all()
)

.'

</div>'

:''

)

.'

<form method="POST" action="/admin/products">
                <input type="hidden"
                       name="_token"
                       value="'.csrf_token().'">

                <label>Tên sản phẩm</label>
                <input type="text" name="productname">

                <label>Giá</label>
                <input type="text" name="price">

                <label>Category</label>

                <select name="cateid">
    ';

    foreach($categories as $cate){

        $html .= '
            <option value="'.$cate->cateid.'">
                '.$cate->catename.'
            </option>
        ';
    }

    $html .= '
                </select>

                <label>Brand</label>

                <select name="brandid">
    ';

    foreach($brands as $brand){

        $html .= '
            <option value="'.$brand->id.'">
                '.$brand->brandname.'
            </option>
        ';
    }

    $html .= '
                </select>

                <button type="submit" class="btn">
                    Lưu Product
                </button>
    <a
    href="/admin/dashboard"
    style="
        display:inline-block;
        padding:10px 15px;
        background:#64748b;
        color:white;
        text-decoration:none;
        border-radius:5px;
        margin-left:10px;
    "
>
    Quay lại Dashboard
</a>

            </form>

        </div>

    </body>
    </html>
    ';

    return $html;
}

    /**
     * Store a newly created resource in storage.
     */
public function store(ProductRequest $request)
{
    Product::create([

        'productname' => $request->productname,

        'price' => $request->price,

        'cateid' => $request->cateid,

        'brandid' => $request->brandid

    ]);

    return redirect('/admin/products')
        ->with(
            'success',
            'Thêm thành công'
        );
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
    $product = Product::findOrFail($id);

    $categories = DB::table('categories')->get();
    $brands = DB::table('brands')->get();

    $html = '
    <html>
    <head>
        <title>Sửa Product</title>

        <style>
            body{
                font-family: Arial;
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

            input, select{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                background:#2563eb;
                color:white;
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Sửa Product</h2>

            <form method="POST" action="/admin/products/'.$product->id.'">

                <input type="hidden"
                       name="_token"
                       value="'.csrf_token().'">

                <input type="hidden"
                       name="_method"
                       value="PUT">

                <label>Tên sản phẩm</label>
                <input type="text"
                       name="productname"
                       value="'.$product->productname.'">

                <label>Giá</label>
                <input type="text"
                       name="price"
                       value="'.$product->price.'">

                <label>Category</label>

                <select name="cateid">
    ';

    foreach($categories as $cate){

        $selected = '';

        if($cate->cateid == $product->cateid){
            $selected = 'selected';
        }

        $html .= '
            <option value="'.$cate->cateid.'" '.$selected.'>
                '.$cate->catename.'
            </option>
        ';
    }

    $html .= '
                </select>

                <label>Brand</label>

                <select name="brandid">
    ';

    foreach($brands as $brand){

        $selected = '';

        if($brand->id == $product->brandid){
            $selected = 'selected';
        }

        $html .= '
            <option value="'.$brand->id.'" '.$selected.'>
                '.$brand->brandname.'
            </option>
        ';
    }

    $html .= '
                </select>

                <button type="submit" class="btn">
                    Cập nhật Product
                </button>

            </form>

        </div>

    </body>
    </html>
    ';

    return $html;
}

    /**
     * Update the specified resource in storage.
     */
public function update(ProductRequest $request, string $id)
{
try{

$product =
Product::findOrFail($id);

$product->update([

'productname'
=> $request->productname,

'price'
=> $request->price,

'cateid'
=> $request->cateid,

'brandid'
=> $request->brandid

]);

return redirect('/admin/products')

->with(
'success',
'Cập nhật thành công'
);

}

catch(\Exception $e){

return back()

->withInput()

->with(
'error',
'Lỗi cập nhật'
);

}

}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    Product::findOrFail($id)
    ->delete();

    return redirect('/admin/products');
}

}
