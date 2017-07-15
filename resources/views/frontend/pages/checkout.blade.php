@extends('frontend.layouts.master')
@section('main')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-check"></span>
                    Thông Tin Thanh Toán
                </h3>
            </div>
            <div class="panel-body" style="background-color: #fff;">
                <div class="col-md-8">
                    <form class="form-horizontal" action="{{ route('getComplete') }}" method="get">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtUser" placeholder="Tên Người Dùng" value="{!! Auth::user()->fullname!!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtEmail" placeholder="Email Người Dùng" value="{!! Auth::user()->email!!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="txtPhone" placeholder="SDT Người Dùng" value="{!! Auth::user()->phone!!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tỉnh/Thành</label>
                            <div class="col-sm-10">
                                <select name="name" id="idTinh" class="form-control">
                                    <option value=""> -- Chọn Tỉnh/Thành --</option>
                                    @foreach($province as $value)
                                        <option value="{{ $value->provinceid }}"> -- {!! $value->name !!} --</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Quận/Huyện</label>
                            <div class="col-sm-10">
                                <select name="name" id="idQuan" class="form-control">
                                    <option value=""> -- Chọn Quận/Huyện --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Địa Chỉ</label>
                            <div class="col-sm-10">
                                {{--<input type="text" class="form-control" id="inputEmail3" placeholder="Địa Chỉ Người Dùng" value="{!! Auth::user()->address!!}">--}}
                                <textarea name="txtAddress" cols="3" rows="3" class="form-control" placeholder="Địa Chỉ Người Dùng">{!! Auth::user()->address!!}</textarea>
                            </div>
                        </div>
                        <input type="hidden" value="{!! Cart::subtotal()!!}" name="total_price">
                        {{--@foreach($content as $item)--}}
                            {{--<input type="text" value="{!! $item->id !!}">--}}
                            {{--<input type="text" value="{!! $item->qty !!}">--}}
                            {{--<input type="text" value="{!! $item->price !!}">--}}
                        {{--@endforeach--}}
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary pull-right" onclick="return alert('Cảm ơn quý khách đã mua sách ^^')">Hoàn Tất</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success" style="border-bottom: 5px solid lightseagreen">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Thông tin thanh toán</h3>
                        </div>
                        <div class="panel-body">
                            <dl>
                                <dt>Tạm Tính:
                                    <span style="color: red;">{!! Cart::subtotal(0,0) !!}₫</span>
                                </dt>
                                <dt>Mã Giãm Giá:</dt>
                                <dt>Phí Vận Chuyển: <span style="color: red;">40,000₫</span></dt>
                            </dl>
                            <div class="alert alert-info">
                                <strong>Tổng Tiền: {!!  Cart::subtotal(0,0)!!} ₫</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop