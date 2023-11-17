<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive get_total_quantity mb-5">
            <table class="table table-bordered text-center mb-0 url_cart_update" data-url={{route('cart.update')}}>
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $total_price_product = 0;
                        $total = 0;
                        $total_quantity = 0;
                    @endphp
                    @foreach ($productsCart as $id=>$productCart)
                        @php
                            $total_quantity += $productCart['quantity'];
                        @endphp
                        <tr>
                            <td class="align-middle"><img src="{{config('app.base_url').$productCart['image_path']}}" alt="" style="width: 50px;">{{$productCart['name']}}</td>
                            <td class="align-middle">${{number_format($productCart['price'])}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus update-cart" data-id={{$id}}>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center get-quantity" value="{{$productCart['quantity']}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus update-cart" data-id={{$id}}>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            @php
                                $total_price_product = $productCart['price']*$productCart['quantity'];
                            @endphp
                            <td class="align-middle">${{number_format($total_price_product)}}</td>
                            <td class="align-middle">
                                <a data-url="{{route('cart.delete',['id' => $id])}}" class="btn btn-sm btn-primary delete-cart" title="Xóa"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                            @php
                                $total += $total_price_product; 
                            @endphp
                    @endforeach
                    <input type="text" class="d-none get-total-quantity" value="{{$total_quantity}}">
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{number_format($total)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">${{number_format($total+10)}}</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>