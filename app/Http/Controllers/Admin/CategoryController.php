<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    // Thùng rác
    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(10);

        return view('admin.categories.trash', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'catename' => 'required|min:2|max:100',
            'slug' => 'required|unique:categories,slug',
        ]);

        Category::create([
            'catename' => $request->catename,
            'slug' => $request->slug,
            'image' => null,
            'status' => 1,
            'sort_order' => 0,
            'description' => null,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Thêm Category thành công');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'catename' => 'required|min:2|max:100',
            'slug' => 'required|unique:categories,slug,' . $id . ',cateid',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'catename' => $request->catename,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Cập nhật Category thành công');
    }

    public function destroy(string $id)
    {
        try {

            Category::findOrFail($id)->delete();

            return redirect()
                ->route('categories.index')
                ->with('success', 'Xóa thành công.');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Thực hiện thất bại.');

        }
    }
    // Khôi phục
public function restore($id)
{
    Category::onlyTrashed()
        ->where('cateid', $id)
        ->restore();

    return redirect()
        ->route('categories.trash')
        ->with('success', 'Khôi phục thành công.');
}

// Xóa vĩnh viễn
public function forceDelete($id)
{
    Category::onlyTrashed()
        ->where('cateid', $id)
        ->forceDelete();

    return redirect()
        ->route('categories.trash')
        ->with('success', 'Đã xóa vĩnh viễn.');
}
}