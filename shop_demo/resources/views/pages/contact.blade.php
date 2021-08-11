@extends('layouts.page_layout')

@section('content')

    <div class="main container mt-3">
        <h1>Liên hệ</h1>
        <div class="row mt-5">
            <div class="col-12 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="col-12 mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="#" class="btn btn-outline-primary">
                    Gửi phản hồi
                </a>
            </div>
        </div>
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
