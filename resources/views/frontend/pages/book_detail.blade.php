@extends('frontend.layouts.master')
@section('main')
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Trang Chủ</a>
            </li>
            @if($cate_parent)
            <li class="active">
                @foreach($cate_parent as $value)
                    <a href="">{!! $value->name !!}</a>

                @endforeach
            </li>
            @endif
            <li class="active"><a href="">{!! $book->cate->name !!}</a></li>
            <li class="active"><a href="">{!! $book->name !!}</a></li>
        </ol>
    </div>
    <div class="row" style="padding: 0px; border-top: 2px solid #26a69a">
        <div class="col-md-9 col-sm-12" style="margin-top: 10px">
            <div class="panel panel-default" style="background-color: #fff">
                <div class="panel-body">
                    <div class="row">
                        <div class="main_book" >
                            <div class="col-md-3">
                                <div class="project" style=" width:210px">
                                    <div class="project__card">
                                        <a href="" class="project__image">
                                            <img src="{!! asset('public/admin/image_book/'.$book->image)!!}" alt="image_book" height="280" width="210">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>{!! $book->name !!}</h3>
                                <p>Tác Giả: <a href="{{ route('getAuthor', ['id' => $book->authors->id, 'slug' => $book->authors->slug]) }}">{!! $book->authors->name !!}</a></p>
                                <p>Nhà Phát Hành: <a href="">{!! $book->publishers->name !!}</a></p>
                                <p>{!! str_limit($book->description, 400) !!}</p>
                            </div>
                            <div class="col-md-3" style="padding: 0px;">
                                <div class="list-group">
                                    <a href="#" class="list-group-item active text-center">
                                        Thông Tin Thanh Toán
                                    </a>
                                    <div class="row list_book book_info">
                                        <ul class="user_info">
                                            <li>Giá Bán: &nbsp;{!! number_format($book->price,0,",",".") !!} ₫</li>
                                            <li>
                                                @if($book->qty_remaining == 0)
                                                    <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: red;"></i> Hết Hàng
                                                @else
                                                    <i class="fa fa-check-circle-o fa-2x" aria-hidden="true" style="color: #27ff02;"></i>&nbsp;Có Hàng
                                                @endif
                                            </li>
                                        </ul>
                                        <a class="btn btn-danger like_book btn-block" data-toggle="tooltip" data-placement="left" title="Thêm Vào Yêu Thích" id="like_book">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                        <button type="button" class="btn btn-primary btn-block">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <a href="{{ route('getProduct', ['id' => $book->id, 'tensach' => $book->slug]) }}" style="color: #FFF">Thêm Vào Giỏ Hàng</a>
                                        </button>
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::check())
                    <div class="col-md-12">
                        <div class="book_social clear-fix">
                            <a href="javascript:void(0)" id="likes" data-id={{$book->id}}>
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <font>Like:<span class="count-likes"> {{ $countLike }}</span></font>
                            </a>
                            {{ csrf_field()}}
                        </div>
                    </div>
                    @endif
                    <div class="row book_cate" style="margin-top: 70px;">
                        <div class="col-md-12" style="padding: 0px;">
                            <div class="list-group">
                                <a class="list-group-item active" style="z-index: 0">Sách Cùng Chuyên Mục</a>
                                <div class="row list_book" style="padding: 10px 10px 4px 10px;">
                                    @foreach($book_cate as $value)
                                        <div class="col-md-3 col-sm-6 text-center">
                                            <?php
                                            $author_book = DB::table('authors')->select('name')->where('id', $value->author_id)->get();
                                            ?>
                                            <img src="{!! asset('public/admin/image_book/'.$value->image) !!}" alt="book" height="170" width="120">
                                            <p style="margin: 5px;"><a href="{{ url('sach/'. $value->id .'/'.$value->slug ) }}">{!! $value->name !!}</a></p>
                                            <span class="author_info">
                                                @foreach($author_book as $value_author)
                                                    <a href="{{ route('getAuthor', ['id' => $value->author_id, 'slug' => $value->slug]) }}" style="color: gray;">{!! $value_author->name !!} </a>
                                                @endforeach
                                            </span><br>
                                            <span>Giá: {!! number_format($value->price,0,",",".") !!} ₫</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row cm_list" style="padding: 20px;">
                        <div class="comment">
                            <strong>{{ $comment->qty_cmt }} bình luận</strong>
                            {{-- count qty comment--}}
                            @if(Auth::check())
                            <div class="cm_detail" style="margin-top: 10px;">
                                <div class="col-md-1">
                                    <img src="{!! asset('public/admin/upload_avatar/'.$user->image)!!}" alt="" height="50" width="50">
                                </div>
                                <div class="col-md-11">
                                    <form action="{{ route('postComment', ['id' => $book->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="cm_content">
                                            <textarea name="content_cm" id="content_cm" cols="10" rows="2" class="form-control" placeholder="Viết bình luận..."></textarea>
                                            <div class="cm_post">
                                                <button class="btn btn-primary btn_post pull-right" type="submit" >Đăng</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif

                        </div>
                        @foreach($book->comment as $value)
                            <div class="cm_row" style="margin-top: 100px;">
                                <div class="col-md-1">
                                    <img src="{!! asset('public/admin/upload_avatar/'.$value->users->image)!!}" alt="" height="50" width="50">
                                </div>
                                <div class="col-md-11" style="padding-top: 12px; font-weight: bold;">
                                    <div class="cm_content">
                                        <p>{{ $value->content }}</p>
                                        <em style="font-size: 12px; color:#aaa;">
                                            <?php \Carbon\Carbon::setLocale('vi')?>
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans() }}
                                        </em>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12" style="margin-top: 10px">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="{{ route('getCart') }}" class="list-group-item active">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        @if(Auth::check())
                            @if($cart)
                                <span class="badge">{!! Cart::content()->count() !!}</span>
                            @endif
                        @endif
                        &nbsp; Giỏ hàng
                    </a>
                    <div class="row list_book" style="padding: 10px 10px 4px 10px;">
                        @if(Auth::check())
                            @if($cart)
                                <p class="text-center" style="font-weight: bold;">{!! "Đã có" . "&nbsp" .Cart::content()->count(). " sách &nbsp" . "trong giỏ hàng" !!}</p>
                            @endif
                        @else
                            <p class="text-center">Giỏ hàng đang rỗng</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        &nbsp; Danh mục sách
                    </a>
                    <div class="row list_book">
                        <ul class="user_info">
                            <?php
                            $cate = DB::table('categories')->where('parent_id', 0)->get();
                            ?>
                            @foreach($cate as $value)
                                <li><a href="{{ route('getBookCate', ['id' => $value->id, 'slug' => $value->alias]) }}">{!! $value->name !!}</a></li>
                                <div>
                                    <ul>
                                        <?php $menu_lv2 = DB::table('categories')->where('parent_id', $value->id)->get(); ?>
                                        @foreach($menu_lv2 as $item_lv2)
                                            <li><a href="{{ route('getBookCate', ['id' => $item_lv2->id, 'slug' => $item_lv2->alias]) }}">{!! $item_lv2->name !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop