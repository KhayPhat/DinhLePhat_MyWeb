<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);

        return view(
            'admin.brands.index',
            compact('brands')
        );
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brandname' => 'required|min:2|max:100',
            'slug' => 'required|unique:brands,slug',
        ]);

        Brand::create([
            'brandname' => $request->brandname,
            'slug' => $request->slug,
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Thêm Brand thành công');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view(
            'admin.brands.edit',
            compact('brand')
        );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandname' => 'required|min:2|max:100',
            'slug' => 'required|unique:brands,slug,' . $id,
        ]);

        $brand = Brand::findOrFail($id);

        $brand->update([
            'brandname' => $request->brandname,
            'slug' => $request->slug,
        ]);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Cập nhật Brand thành công');
    }

    public function destroy(string $id)
    {
        Brand::findOrFail($id)->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Xóa Brand thành công');
    }
}