@extends('admin.layouts.master')
@section('main')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" name="txtUser" value="{{ $user->fullname }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ $user->email }}" disabled/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" id="txtPass" disabled/>
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRe_Pass" id="txtRe_Pass" disabled/>
                            </div>

                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1"
                                           @if($user->quyen == 1)
                                                   {{ "checked" }}
                                                   @endif
                                           type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="0"
                                    @if($user->quyen == 0)
                                        {{ "checked" }}
                                    @endif
                                        type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">User Edit</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('frontend.js')
    <script>
        $(document).ready(function(){
            $("#checkbox").change(function(){
                if($(this).is(":checked")){
                    $("#txtPass, #txtRe_Pass").removeAttr("disabled");
                }else{
                    $("#txtPass, #txtRe_Pass").attr("disabled", "");
                }
            });
        });
    </script>
@endsection