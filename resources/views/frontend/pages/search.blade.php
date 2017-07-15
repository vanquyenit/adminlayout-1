@extends('frontend.layouts.master')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <b style="color: #00adff">Từ khóa: <span style="color: red">{{ $keyword }}</span></b>
        </ol>
    </div>
    <div class="col-md-12 col-sm-12" style="padding: 0px; border-top: 2px solid #26a69a">
        <div class="main_book" style="margin-top: 10px">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp;<b>Sách Được Tìm Kiếm</b>
                    </a>
                    <div class="row list_book" style="padding: 10px;">
                        @if (count($book) === 0)
                            <h3 class="text-center" style="color:red;">Chúng tôi chưa có thông tin về từ khóa bạn đang tìm kiếm :))</h3>
                        @elseif (count($book) >= 1)
                            @foreach($book as $value)
                                <div class="col-md-3 col-sm-6 text-center">
                                    <img src="{!! asset('public/admin/image_book/'.$value->image) !!}" alt="book" height="170" width="120">
                                    <p style="margin: 0"><a href="{{ url('sach/'. $value->id .'/'.$value->slug ) }}">{!! $value->name !!}</a></p>
                                    <span class="author_info"><a href="{{ route('getAuthor', ['id' => $value->author_id, 'slug' => $value->authors->slug]) }}"  style="color: gray;">{!! $value->authors->name !!}</a></span><br>
                                    <span>Giá: {!! number_format($value->price,0,",",".") !!} ₫</span>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{ $book->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop