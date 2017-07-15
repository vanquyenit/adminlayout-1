@extends('frontend.layouts.master')
@section('main')
    <div class="col-md-9 col-sm-12" style="padding: 0px;">
        <div class="row">
            <h3>
            <span class="maintext">
            <i class="fa fa-compress" aria-hidden="true"></i>
             &nbsp;Liên Hệ
            </span>
            </h3>
        </div>
        <div class="row" style="padding: 10px;">
            <form class="form-horizontal" method="post" action="{{ route('postContact') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="txtTen" name="txtTen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tiêu Đề</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="txtTieuDe" name="txtTieuDe">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tin Nhắn</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" id="txtTinNhan" name="txtTinNhan"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
        </form>
        </div>
    </div>
    @include('frontend.pages.right_sidebar')
@stop