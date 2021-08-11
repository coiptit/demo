@extends('layouts.admin_layout')

@section('title', 'Danh mục sản phẩm')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quản lý danh mục sản phẩm</h1>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success">Add</a>
                </div>
                <div>
                    <form action="{{ route('admin.categories.index') }}" method="GET" role="search" class="input-group">
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
                        <th scope="col">Danh mục sản phẩm</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
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
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
        </div>
    </main>
@endsection
