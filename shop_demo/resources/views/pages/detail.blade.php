@extends('layouts.page_layout')

@section('content')

    <div class="main container mt-3">
        <h1>Chi tiết sản phẩm</h1>
        <div class="row justify-content-around">
            <div class="col-12 col-md-4">
                <div class="card h-100 text-center p-1">
                    <img
                        src="{{ asset('uploads/' . $product->image) }}"
                        class="card-img-top"
                        alt="..."
                    />
                </div>
            </div>

            <div class="col-12 col col-md-5">
                <h2 class="text-info">Điện thoại {{$product->name}}</h2>
                <h3>{{$product->summary}}</h3>
                <h3>{{$product->description}}</h3>
                <h3 class="text-warning">Giá:{{number_format($product->price,0,',','.')}} Đ</h3>
                <div class="card-footer text-center">
                    <a href="./cart.html" class="btn btn-outline-primary">
                        <i class="fas fa-cart-plus"></i> Mua ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
