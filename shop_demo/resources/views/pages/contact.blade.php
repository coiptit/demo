@extends('layouts.page_layout')

@section('content')

    <div class="main container mt-3">
        <h1>Liên hệ</h1>
        <form action="{{route('contactPost')}}" method="POST">
        @csrf
        <div class="row mt-5">
            <div class="col-12 mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập họ tên">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Nội dung</label>
                <textarea class="form-control" name="message" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-outline-primary" value="Gửi phản hồi"/>
            </div>
        </div>
        </form>
        <div class="row mt-5">
            <div class="col-12 col-md-4 text-center text-success">
                <i class="fas fa-phone-square-alt"></i> 0976536420
            </div>
            <div class="col-12 col-md-4 text-center text-danger">
                <i class="far fa-envelope"></i> Phu742k@gmail.com
            </div>
            <div class="col-12 col-md-4 text-center">
                <a href="#" class="text-decoration-none"><i class="fab fa-facebook"></i> Phạm Đình Phú</a>
            </div>
        </div>
    </div>
@endsection
