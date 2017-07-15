
@extends('frontend.layouts.master')
@section('main')
    <div class="row" style="padding: 10px;">
        <h3><span class="maintext"><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp;Shopping Cart</span></h3>
    </div>
   <div class="row">
       <div class="col-md-12">
           <div class="panel panel-primary" style="background-color: #fff;">
               <div class="panel-body">
                   @if(Auth::check())
                       @if($cart)
                       <div class="table-responsive">
                           <table class="table table-hover table-bordered">
                               <tr>
                                   <th class="text-center">Ảnh</th>
                                   <th class="text-center">Tên Sách</th>
                                   <th class="text-center">Số Lượng</th>
                                   <th class="text-center">Hành Động</th>
                                   <th class="text-center">Giá</th>
                                   <th class="text-center">Tổng Cộng</th>
                               </tr>
                               <form action="" method="POST">
                                   {{ csrf_field() }}
                                   @foreach($content as $items)
                                       <tr class="cart_info">
                                           <td class="text-center"><a href="#"><img title="product" alt="product" src="{!! asset('public/admin/image_book/'.$items->options["img"]) !!}" height="100" width="70"></a></td>
                                           <td class="text-center" style="vertical-align: middle;"><a href="">{!! $items->name !!}</a></td>
                                           <td class="text-center" style="vertical-align: middle;">
                                               <input type="text" size="1" value="{!! $items->qty !!}" name="quantity" class="qty_book">
                                           </td>
                                           <td class="text-center" style="vertical-align: middle;">
                                               <a href="#" data-toggle="tooltip" data-placement="top" title="Update" style="padding: 5px;" class="update_book" id="{!! $items->rowId !!}">
                                                   <i class="fa fa-refresh icon_cart" aria-hidden="true"></i>
                                               </a>
                                               <a href="{{ url('xoa-sach', ['id' => $items->rowId]) }}" data-toggle="tooltip" data-placement="top" title="Remove" style="padding: 5px;">
                                                   <i class="fa fa-trash-o icon_cart" aria-hidden="true"></i>
                                               </a>
                                           </td>
                                           <td class="text-center" style="vertical-align: middle;">{!! number_format($items->price,0,",",".") !!} ₫</td>
                                           <td class="text-center" style="vertical-align: middle;">{!! number_format($items->price * $items->qty,0,",",".") !!} ₫</td>
                                       </tr>
                                   @endforeach
                               </form>
                           </table>
                           <div class="pull-left">
                               <a href="{{ route('delAllProduct') }}" class="btn btn-danger">Xóa Tất Cả Sách</a>
                           </div>
                           <div class="pull-right">
                               <div class="span4 pull-right">
                                   <table class="table table-striped table-bordered ">
                                       <tr>
                                           <td><span class="extra bold totalamout">Tổng Cộng :</span></td>
                                           <td><span class="bold totalamout" style="color: red; font-weight: bold;">{!! Cart::subtotal(0,0)!!}₫</span></td>
                                       </tr>
                                   </table>
                                   <a href="{{ url('/') }}" class="btn btn-primary">Tiếp tục mua</a>
                                   <a class="btn btn-success" id="checkout" href="{{ route('getCheckOut') }}">Thanh toán</a>
                               </div>
                           </div>
                       </div>
                       @else
                       <h3 class="text-center">Hay lắm, Chưa có sách nào trong giỏ hàng <i class="fa fa-firefox" aria-hidden="true"></i></h3>
                       @endif
                   @else
                       <h3 class="text-center">Bạn cần đăng nhập để mua hàng<i class="fa fa-firefox" aria-hidden="true"></i></h3>
                    @endif
               </div>

           </div>
       </div>
   </div>
@stop
