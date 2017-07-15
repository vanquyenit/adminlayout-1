@extends('admin.layouts.master')
@section('main')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <i class="fa fa-home" aria-hidden="true"></i> &nbsp;
                        <ol class="breadcrumb" style="display: inline">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-md-12" style="padding-bottom:120px">
                        @include('admin.layouts.error')
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-7">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">User Info</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{!! old('txtUser') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" value="{!! old('txtPass') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>RePassword</label>
                                            <input type="password" class="form-control" name="txtRe_Pass" placeholder="Please Enter RePassword" value="{!! old('txtRe_Pass') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="txtFullname" placeholder="Please Enter FullName" value="{!! old('txtFullname') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="txtPhone" placeholder="Please Enter Phone" value="{!! old('txtPhone') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" value="{!! old('txtAddress') !!}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Panel title</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <input type="file" class="form-control" name="avatar_file" />
                                        </div>
                                        <div class="form-group">
                                            <label>User Level</label>
                                            <select name="rdoLevel" id="inputID" class="form-control">
                                                <option value="1"> -- Admin --</option>
                                                <option value="0"> -- Member --</option>
                                            </select>
                                        </div>
										<button type="submit" class="btn btn-primary">User Add</button>
                                    </div>
                                </div>
                            </div>
                        <form>
                    </div>
                </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection