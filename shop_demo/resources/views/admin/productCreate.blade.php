@extends('layouts.admin_layout')

@section('title', 'Sản phẩm')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm sản phẩm</h1>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nhập mã sản phẩm</label>
                    <input type="text" class="form-control" name="code" placeholder="mã sản phẩm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="tên sản phẩm">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập tóm tắt</label>
                    <input type="text" class="form-control" name="summary" placeholder="tóm tắt">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập mô tả</label>
                    <input type="text" class="form-control" name="description" placeholder="mô tả">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn danh mục sản phẩm</label>
                    <select class="form-select" name="cate_id">
                        <option value="0" selected>Danh mục sản phẩm</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" placeholder="giá">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Lưu">
                </div>
            </form>
        </div>
    </main>
@endsection
