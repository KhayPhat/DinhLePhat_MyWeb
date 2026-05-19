<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Danh sách category";
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
        return "Lưu category";
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