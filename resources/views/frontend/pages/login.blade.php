@extends('frontend.layouts.master')
@section('main')
    <div class="col-md-12 col-sm-12" style="padding: 0px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="list-group">
                <p class="text-center">
                    <a href="#" class="list-group-item active">&nbsp;
                        <strong class="text-center">Đăng Nhập</strong>
                    </a>
                </p>
                <div class="row list_book" style="padding: 35px;">
                    <div class="col-md-6">
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
                    <div class="col-md-6" style="border-left: 2px solid #43af50">
                        <a class="btn loginBtn loginBtn--facebook">
                          Login with Facebook
                        </a>

                        <a class="btn loginBtn loginBtn--google">
                          Login with Google
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop