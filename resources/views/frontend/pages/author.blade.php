@extends('frontend.layouts.master')
@section('main')
    <div class="col-md-12 col-sm-12" style="padding: 0px; border-top: 2px solid #26a69a">
        <div class="main_book" style="margin-top: 10px">
            <div class="col-md-9">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp;<b>Sách Của Tác Giả</b>
                    </a>
                    <div class="row list_book" style="padding: 10px;">
                        @foreach($book as $value)
                            <div class="col-md-3 col-sm-6 text-center">
                                <img src="{!! asset('public/admin/image_book/'.$value->image) !!}" alt="book" height="170" width="120">
                                <p style="margin: 0"><a href="{{ url('sach/'. $value->id .'/'.$value->slug ) }}">{!! $value->name !!}</a></p>
                                <span class="author_info"><a href="#">{!! $value->authors->name !!}</a></span><br>
                                <span>Giá: {!! number_format($value->price,0,",",".") !!} ₫</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông Tin Tác Giả</h3>
                    </div>
                    <div class="panel-body">
                        <h3 class="text-center">{!! $author->name !!}</h3>
                        <a href="#" class="thumbnail">
                            <img src="{!! asset('public/admin/images/'.$author->avatar)!!}" alt="image_book">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop