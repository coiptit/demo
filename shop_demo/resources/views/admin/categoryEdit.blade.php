@extends('layouts.admin_layout')

@section('title', 'Danh mục sản phẩm')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm danh mục sản phẩm</h1>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nhập danh mục sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                        placeholder="danh mục sản phẩm">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Lưu">
                </div>
            </form>
        </div>
    </main>
@endsection
