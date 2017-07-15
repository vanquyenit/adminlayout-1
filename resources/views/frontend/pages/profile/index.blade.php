@extends('frontend.layouts.master')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Trang Chủ</a>
            </li>
            <li><a href="" style="color: black">Trang Cá Nhân</a></li>
        </ol>
    </div>
    <div class="col-md-12 col-sm-12" style="padding: 0px;">
        <div class="col-md-3">
            <?php $route_name = \Request::route()->getName();?>
            <div class="col-md-12">
                <div class="profile_left">
                    <ul class="profile_sidebar list-group">
                        <li class="list-group-item {!! $route_name == 'profile.detail' || $route_name == 'profile.change-password' ? 'actived' : '' !!}">
                            <a href=""><i class="fa fa-user" aria-hidden="true"></i> Thông Tin Tài Khoản</a>
                        </li>
                        <li class="list-group-item">
                            <a href=""><i class="fa fa-pencil fa-pencil-edit" aria-hidden="true"></i> Chỉnh Sửa Thông Tin</a
                        </li>
                        <li class="list-group-item">
                            <a href=""><i class="fa fa-history" aria-hidden="true"></i> Lịch Sử Mua Hàng</a>
                        </li>
                        <li class="list-group-item">
                            <a href=""><i class="fa fa-heart" aria-hidden="true"></i> Sản Phẩm Yêu Thích</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-success" style="background-color: #fff;">
                <div class="panel-body">
                    Panel body ...
                </div>
            </div>
        </div>
    </div>
@stop