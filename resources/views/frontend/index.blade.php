@extends('frontend.layouts.master')
@section('main')
<div class="col-md-9 col-sm-12" style="padding: 0px;">
    <div class="col-md-12 col-sm-12">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp;<b>Sách mới</b>
            </a>
            <div class="row list_book" style="padding: 10px;">
                @foreach($book as $value)
                <div class="col-md-3 col-sm-6 text-center">
                    <img src="{!! asset('public/admin/image_book/'.$value->image) !!}" alt="book" height="170" width="120">
                    <p style="margin: 5px;"><a href="{{ url('sach/'. $value->id .'/'.$value->slug ) }}">{!! $value->name !!}</a></p>
                    <span class="author_info"><a href="{{ route('getAuthor', ['id' => $value->authors->id, 'slug' => $value->authors->slug]) }}" style="color: gray;">{!! $value->authors->name !!}</a></span><br>
                    <span>Giá: {!! number_format($value->price,0,",",".") !!} ₫</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp;<b>Sách bán chạy</b>
            </a>
            <div class="row list_book">
                <div class="col-md-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, quos.
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.pages.right_sidebar');
@stop