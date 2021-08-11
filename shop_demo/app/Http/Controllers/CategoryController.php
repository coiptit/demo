<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Hiển thị danh mục sản phẩm
    public function index(Request $request)
    {
        if ($request->input('keyword')!= null) {
            $key=trim($request->input('keyword'));
            $categories=Category::where('name','like',"%$key%")->paginate(5);
        }else{
            $categories=Category::latest()->paginate(5);
        }

        return view('admin.category',compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5+1);
    }

    //Trang tạo danh mục sản phẩm
    public function create()
    {
        return view('admin.categoryCreate');
    }

    //Lưu danh mục sản phẩm thêm mới
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Thêm mới thành công.');
    }

    public function show(Category $category)
    {
        //
    }

    //Trang sửa danh mục sản phẩm
    public function edit(Category $category)
    {
        return view('admin.categoryEdit',compact('category'));
    }

    //Cập nhật danh mục sản phẩm
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Sửa thành công.');
    }

    //Xóa danh mục sản phẩm
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Đã xóa thành công.');
    }

}
