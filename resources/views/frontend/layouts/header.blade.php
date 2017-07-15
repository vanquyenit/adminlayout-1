
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Store</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--CSS Link--}}
    <link rel="stylesheet" href="{!! asset('public/frontend/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('public/frontend/css/theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/css/frontend_css.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/frontend/sweetalert.css') !!}">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    {{--JS Link--}}

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{!! asset('public/js/smoothscroll.js') !!}"></script>
    <script src="{!! asset('public/frontend/sweetalert.min.js') !!}"></script>
    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}" style="color: #0c3063">ChickenRain Shop</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Sách Mới</a></li>
                <li><a href="#">Sách Bán Chạy</a></li>
                <li><a href="{{ route('getContact') }}">Liên Hệ</a></li>
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->username !!}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('getProfile',['id' => Auth::user()->id]) }}">Trang Cá Nhân</a></li>
                            <li><a href="{{ route('getUserlogout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Người Dùng <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('getuserregister') }}">Đăng Ký</a></li>
                            <li><a href="{{ route('getuserlogin') }}">Đăng Nhập</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
            <form class="navbar-form pull-right" role="search" method="post" action="{{ route('postSearch') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search_book">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </nav>