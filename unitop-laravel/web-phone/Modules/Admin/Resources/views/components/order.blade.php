@if($orders)
<table class="table">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i=0;
         @endphp
        @if(isset($orders))
            @foreach($orders as $order)
                <tr>
                    <td>{{$i}}</td>
                    <td>
                        <a href="{{route('get.detail.product',[$order->product->pro_slug,$order->or_product_id])}}" target="_blank">{{isset($order->product->pro_name)? $order->product->pro_name :''}}</a>
                    </td>
                    <td>
                        <a href="#"><img style="width:200px;height:150px" src="{{isset($order->product->pro_avatar)? pare_url_file($order->product->pro_avatar) :''}}" class="img-responsive" alt=""/></a>
                    </td>
                    <td>
                        <div class="cart-price">{{number_format($order->or_price,0,',',',')}}$</div>
                    </td>
                    <td>
                        {{$order->or_qty}}
                    </td>
                    <td>
                        {{number_format($order->or_price*$order->or_qty,0,',',',')}}$
                    </td>
                    <td>
                        <a href="{{route('delete.product',$key)}}"><i  class="fas fa-trash-alt">  Xóa</i></a>
                    </td>
                </tr>
                @php
                  $i++;
                @endphp
            @endforeach
        @endif
    </tbody>
</table>
{{-- <h1>NAm</h1> --}}
@endif
