<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $products = Product::with([
        'category',
        'brand',
        'images'
    ])->paginate(10);

    return view(
        'admin.products.index',
        compact('products')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $categories = DB::table('categories')->get();

    $brands = DB::table('brands')->get();

    return view(
        'admin.products.create',
        compact('categories', 'brands')
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(ProductRequest $request)
{
$product = Product::create([

    'productname' => $request->productname,

    'price' => $request->price,

    'cateid' => $request->cateid,

    'brandid' => $request->brandid,

]);

    if($request->hasFile('images')){

        foreach($request->file('images') as $file){

            $path =
            $file->store(
                'products',
                'public'
            );

            ProductImage::create([

                'product_id'=>$product->id,

                'image'=>$path

            ]);
        }
    }

    return redirect('/admin/products');
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

    return view(
        'admin.products.edit',
        compact(
            'product',
            'categories',
            'brands'
        )
    );
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
