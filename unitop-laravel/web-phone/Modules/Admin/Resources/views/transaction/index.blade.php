@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản lí đơn hàng</li>
                </ol>
        </nav>
</div>
<div class="table-responsive">
        <h2>Quản Lí Đơn Hàng <a href="{{route('admin.get.list.create.category')}}" class="float-end"><i class="fas fa-folder-plus btn btn-outline-dark">&nbspThêm mới</i></a></h2>
        
        <table class="table table-striped table-sm" id="empTable">
        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" style="padding-left:60px">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
               $i=0;
            @endphp
            @if(isset($transactions))
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{isset($transaction->user->name)?$transaction->user->name:'[N\A]'}}</td>
                    <td>{{number_format($transaction->tr_total,0,',',',')}} VNĐ</td>
                    <td>{{$transaction->tr_note}}</td>
                    <td>{{$transaction->tr_address}}</td>
                    <td>{{$transaction->tr_phone}}</td>
                    <td>
                        @if($transaction->tr_status==1)
                            <a href="#" class="btn btn-success btn-sm">Đã xử lý</a>
                        @else
                            <a href="#" class="btn btn-danger btn-sm">Chưa xử lý</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.get.action.product',['delete',$transaction->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
                        <a class="js-order-item" data-id="{{$transaction->id}}" href="{{route('admin.get.view.order',$transaction->id)}}"><i style="padding: 5px 10px;border:1px solid #eee;" class="fas fa-eye"></i></a>
                    </td>
                  </tr>
                @endforeach
            @endif
            @php
              $i++;
            @endphp
        </tbody>
    </table>                  
</div>
<div class="modal" tabindex="-1" id="myModalOrder">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chi tiết mã đơn hàng # <b class="transaction_id"></b> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="md_content">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@stop

@section('script')
    <script type='text/javascript'>
      $(function(){
        $(".js-order-item").click(function(e){
            e.preventDefault(); 
            let $this= $(this);
            let url= $this.attr('href');
            $("#md_content").html('');
            $(".transaction_id").text('').text($this.attr("data-id"));
            $("#myModalOrder").modal("show");
            // console.log(url);
            $.ajax({
              url:url,
              dataType: 'json',
              
            }).done(function(result){
              console.log(result);
              if(result){
                   $("#md_content").append(result);  
              }
            });
        });
      });
    </script>
@stop