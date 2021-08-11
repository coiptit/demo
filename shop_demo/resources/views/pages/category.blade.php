@extends('layouts.page_layout')

@section('content')
    <div class="main container mt-3">
        <h1>Danh mục: {{$products[0]->category->name}}</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 text-center p-1">
                        <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p>{{$product->summary}}</p>
                            <h6 class="text-warning">{{number_format($product->price, 0, ',', '.')}} Đ</h6>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('detail',$product->id)}}" class="btn btn-outline-primary"> Xem chi tiết </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
