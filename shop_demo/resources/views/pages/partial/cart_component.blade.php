<div class="main container mt-3 update-cart-url" data-url="{{route('updateCart')}}">
    <div class="cart" data-url="{{route('deleteCart')}}">
        <h1>Giỏ hàng</h1>
        @php
            $total = 0;
        @endphp
        @foreach($carts as $id => $cartItem)
            @php
                $total = $total+ $cartItem['price'] * $cartItem['quantity'];
            @endphp
            <div class="row justify-content-around mt-3 parents">
                <div class="col-12 col-md-2">
                    <div class="card h-100 text-center p-1">
                        <img
                            src="{{asset('uploads/'. $cartItem['image'])}}"
                            class="card-img-top"
                            alt="..."
                        />
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <h6 class="text-danger">{{$cartItem['name']}}</h6>
                    <h6>{{$cartItem['summary']}}</h6>
                    <h6>Đơn giá:{{number_format($cartItem['price'],0,',','.')}} Đ</h6>
                </div>

                <div class="col-12 col-md-3">
                    <h6>Số lượng</h6>
                    <div class="input-group align-items-center">
                        <input
                            type="number"
                            class="form-control input-number quantity"
                            value="{{$cartItem['quantity']}}"
                            min="1"
                            max="100"
                        />
                    </div>
                    <h6>Thành tiền:{{number_format($cartItem['price']*$cartItem['quantity'],0,',','.')}} Đ</h6>
                </div>

                <div class="col-12 col-md-2">
                    <a href="#" data-id="{{$id}}" class="btn btn-outline-primary update-cart">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                    <a href="#" data-id="{{$id}}" class="btn btn-outline-danger delete-cart">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center text-center mt-5">
            <h3>Thành tiền:{{$total}}Đ</h3>
            <div class="col-12 col-md-2">
                <a href="#" class="btn btn-outline-primary"> Thanh toán </a>
            </div>
        </div>
    </div>

</div>
