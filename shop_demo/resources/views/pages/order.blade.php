<h1>Xin chào {{$orders['name']}}</h1>
<p>SĐT: {{$orders['phone']}}</p>
<p>Địa chỉ: {{$orders['address']}}</p>
<p>Lời nhắn: {{$orders['message']}}</p>

<h3>Bạn đã mua sản phẩm:</h3>
@php
    $total = 0;
@endphp
@foreach($orders['carts'] as $item)
    @php
        $total = $total+ $item['price'] * $item['quantity'];
    @endphp
    <p>- x{{$item['quantity']}} {{$item['name']}} {{$item['summary']}} giá:{{number_format($item['price']*$item['quantity'],0,',','.')}}Đ</p>
    <br>
@endforeach
<h4>Tổng thanh toán: {{number_format($total,0,',','.')}}Đ</h4>
<h3>Thank you</h3>
