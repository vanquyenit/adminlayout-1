
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Admin Control Panel</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--CSS Link--}}
    <link rel="stylesheet" href="{!! asset('public/admin/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/skins/_all-skins.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin/css/customize.css') !!}">
    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    {{--JS Link--}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{!! asset('public/admin/plugin/ckeditor/ckeditor.js') !!}"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">
            <span class="logo-mini"><b>D</b>N</span>
            <span class="logo-lg"><p>{{ Auth::user()->fullname}}</p></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{!! asset('public/admin/dist/img/user2-160x160.jpg')!!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{!! asset('public/admin/dist/img/user3-128x128.jpg')!!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{!! asset('public/admin/dist/img/user4-128x128.jpg')!!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{!! asset('public/admin/dist/img/user3-128x128.jpg')!!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{!! asset('public/admin/dist/img/user4-128x128.jpg')!!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! asset('public/admin/upload_avatar/'. $user->image)!!}" class="user-image" alt="User Image">
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{!! asset('public/admin/upload_avatar/'. $user->image)!!}" class="img-circle" alt="User Image">
                                <p>
                                    {!! Auth::user()->username !!}
                                    <small>Admin since {!! Auth::user()->registration_date !!}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat" id="profile">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('getlogout') }}" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel" id="user-panel">
                <div class="pull-left image">
                    <img src="{!! asset('public/admin/upload_avatar/'. $user->image)!!}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
            </form>
            <ul class="sidebar-menu">
                <li class="treeview active">
                    <a href="{{ url('admin') }}">
                        <i class="fa fa-home" aria-hidden="true"></i><span>Trang Chủ</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-folder-open" aria-hidden="true"></i><span>Danh Mục</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{ route('getCateAdd') }}">
                                <i class="fa fa-plus-square" aria-hidden="true"></i><span>Thêm</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('getCateList') }}">
                                <i class="fa fa-list-ul" aria-hidden="true"></i><span>Danh Sách</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-book" aria-hidden="true"></i><span>Sách</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{ route('getBookAdd') }}">
                                <i class="fa fa-plus-square" aria-hidden="true"></i><span>Thêm</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('getBookList') }}">
                                <i class="fa fa-list-ul" aria-hidden="true"></i><span>Danh Sách</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user-secret" aria-hidden="true"></i><span>Tác Giả</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{ route('getAuthorAdd') }}">
                                <i class="fa fa-plus-square" aria-hidden="true"></i><span>Thêm</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('getAuthorList') }}">
                                <i class="fa fa-list-ul" aria-hidden="true"></i><span>Danh Sách</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-users" aria-hidden="true"></i><span>Nhà Phát Hành</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{ route('getPublisherAdd') }}">
                                <i class="fa fa-plus-square" aria-hidden="true"></i><span>Thêm</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('getPublisherList') }}">
                                <i class="fa fa-list-ul" aria-hidden="true"></i><span>Danh Sách</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user" aria-hidden="true"></i><span>Người Dùng</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{ route('getUserAdd') }}">
                                <i class="fa fa-plus-square" aria-hidden="true"></i><span>Thêm</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('getUserList') }}">
                                <i class="fa fa-list-ul" aria-hidden="true"></i><span>Danh Sách</span>
                                <span class="pull-right-container"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{ route('getOrderList') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn Hàng</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
