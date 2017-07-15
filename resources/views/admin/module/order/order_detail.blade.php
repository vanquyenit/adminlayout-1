@extends('admin.layouts.master')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <i class="fa fa-home" aria-hidden="true"></i> &nbsp;
                        <ol class="breadcrumb" style="display: inline">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Order Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-bottom:120px">
                <div class="table-responsive">
                    <form action="{{ route('postUpdateStatus') }}" method="post" id="">
                        {{ csrf_field()}}
                        <input type="text" name="id" hidden value="{{ $order->id}}">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr class="info">
                                <th>
                                    <p>Mã Đơn Đặt Hàng: <span style="color: #9f191f">{!! $order->id !!}</span></p>
                                    <p>Người Đặt: <span style="color: #9f191f">{!! $order->fullname !!}</span></p>
                                    <p>Nơi Giao: <span style="color: #9f191f">{!! $order->address !!}</span></p>
                                    <p>Ngày Đặt: <span style="color: #9f191f">{!! $order->date !!}</span></p>
                                </th>
                                <th colspan="3">
                                    <p>Trạng Thái:</p>
                                    <select name="status_order" class="form-control">
                                        @if ($order->status == 0)
                                            {!! '<option selected value="0"> Chưa Giao</option>'!!}
                                            {!! '<option value="1">Đã Giao</option>' !!}
                                        @else
                                            {!! '<option selected value="1">Đã Giao</option>' !!}
                                            {!! '<option value="0">Chưa Giao</option>' !!}
                                        @endif
                                    </select>
                                    <div style="padding: 5px;">
                                        <a href="{{ route('getDeleteOrder', ['id'=> $order->id]) }}" onclick="return delcate('Bạn có muốn xóa thể loại?')" class="btn btn-danger" id="XoaDH">Xóa</a>
                                        <button class="btn btn-info" type="submit"> Cập nhật</button>
                                    </div>
                                </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="success">
                                    <td><b>Tên Sản Phẩm</b></td>
                                    <td><b>Số Lượng</b></td>
                                    <td><b>Đơn Giá</b></td>
                                    <td><b>Thành Tiền</b></td>
                                </tr>

                                @foreach($orderDetail as $value)
                                    <?php
                                    $tongtien = 0;
                                    $tongtien += $value["qty"] * $value["price"];
                                    ?>
                                <tr class="success">
                                    <td><span style="color: #00adff">{{ $value->Book->name }}</span></td>
                                    <td>{{ $value->qty }}</td>
                                    <td>{{ number_format($value->price,0,",",".") }}</td>
                                    <td>{{ number_format($value->qty * $value->price,0,",",".") }}</td>
                                </tr>
                                @endforeach
                                <tr class="success">
                                    <td colspan="3">
                                        <b>Tổng tiền:</b>
                                    </td>
                                    <td><b>{!! number_format($tongtien,0,",",".") !!}</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop