<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Control Panel</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{!! asset('public/admin/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/skins/_all-skins.min.css') !!}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{!! asset('public/admin/plugin/ckeditor/ckeditor.js') !!}"></script>
    <script src="{!! asset('public/js/smoothscroll.js') !!}"></script>
    <link rel="stylesheet" href="{!! asset('public/admin/css/customize.css') !!}">
</head>
<body class="hold-transition skin-blue sidebar-mini" id="login_admin">
<div class="container login_container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                {{--@if(count($errors) > 0)--}}
                    {{--<div class="alert alert-danger alert_msg">--}}
                        {{--<ul>--}}
                            {{--@foreach($errors->all() as $er)--}}
                                {{--<li>{{ $er }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}

                    @if(session('thongbao'))
                        <div class="alert alert-danger alert_msg text-center">
                            {!! session('thongbao') !!}
                        </div>
                    @endif

                <div class="panel-body">
                    <form role="form" action="" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! asset('public/admin/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('public/admin/dist/js/app.min.js') !!}"></script>

<script src="{!! asset('public/js/myscript.js') !!}"></script>
</body>
</html>