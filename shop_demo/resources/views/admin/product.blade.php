@extends('layouts.admin_layout')

@section('title', 'Sản phẩm')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quản lý sản phẩm</h1>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success">Add</a>
                </div>
                <div>
                    <form action="{{ route('admin.products.index') }}" method="GET" role="search" class="input-group">
                        <div class="form-outline">
                            <input type="text" name="keyword" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Danh mục sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->summary }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><img src="{{ asset('uploads/' . $product->image) }}" width="50px" alt="#"></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="text-decoration-none text-info"><i class="fas fa-edit"></i>Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background-color:transparent;"
                                        class="text-danger" onclick="if(!(confirm('Bạn có muốn xóa không?'))) return false">
                                        <i class="fas fa-trash-alt"></i>Xóa</a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links('vendor.pagination.bootstrap-4') }}
        </div>
    </main>
@endsection
