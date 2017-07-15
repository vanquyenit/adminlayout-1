@extends('admin.layouts.master')
@section('main')
    <div id="particles">
        <section class="content-header">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <i class="fa fa-home" aria-hidden="true"></i> &nbsp;
                        <ol class="breadcrumb" style="display: inline">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" id="content_index">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{!! $total_book !!}</h3>
                            <p>Sách</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('getBookList') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! $total_order !!}</h3>
                            <p>Đơn Hàng</p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('getOrderList') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{!! $total_user !!}</h3>
                            <p>Thành Viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('getUserList') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{!! $total_cate !!}</h3>
                            <p>Danh Mục</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hdd-o" aria-hidden="true"></i>
                        </div>
                        <a href="{{ route('getCateList') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop