@extends('layouts.admin_layout')

@section('title','Khách hàng')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Quản lý khách hàng</h1>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="btn btn-outline-success">Add</a>
            </div>
            <div>
                <div class="input-group">
                    <div class="form-outline">
                      <input type="search" id="form1" class="form-control" />
                    </div>
                    <a href="#" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </a>
                  </div>
            </div>

        </div>
        <table class="table table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <a href="#" class="text-decoration-none text-info"><i class="fas fa-edit"></i>Sửa</a>
                        <a href="#" class="text-decoration-none text-danger" onclick="if(!(confirm('Bạn có muốn xóa không?'))) return false"><i class="fas fa-trash-alt"></i>Xóa</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <a href="#" class="text-decoration-none text-info"><i class="fas fa-edit"></i>Sửa</a>
                        <a href="#" class="text-decoration-none text-danger" onclick="if(!(confirm('Bạn có muốn xóa không?'))) return false"><i class="fas fa-trash-alt"></i>Xóa</a>
                    </td>
                  </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
