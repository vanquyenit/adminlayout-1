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
                            <li class="active">Author</li>
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
                                            <label>Tên</label>
                                            <input class="form-control" name="txtAuthor" placeholder="Please Enter Username" value="{!! old('txtAuthor') !!}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <input type="file" name="author_avatar" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="txtDescription" placeholder="Please Enter RePassword" value="{!! old('txtDescription') !!}"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Author</button>
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