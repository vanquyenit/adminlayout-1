@extends('admin.layouts.master')
@section('main')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <i class="fa fa-home" aria-hidden="true"></i> &nbsp;
                            <ol class="breadcrumb" style="display: inline">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="active">Book</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-8 col-md-offset-2" style="padding-bottom:120px">
                    @include('admin.layouts.error')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Book Edit</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Danh Mục Cha</label>
                                    <select class="form-control" name="sltParent">
                                        <option value="0">Please Choose Category</option>
                                        <?php cate_parent($parent,0,"--", $dataCate->cate_id);?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Sách</label>
                                    <input class="form-control" name="txtBookName" placeholder="Please Enter Category Name" value="{!! old('txtBookName', isset($dataCate["name"]) ? $dataCate["name"] : null) !!}" />
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select name="rdoLevel" id="inputID" class="form-control">
                                        <option value="1"> -- Hiện --</option>
                                        <option value="0"> -- Ẩn --</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Book</button>
                                <form>
                        </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
@endsection
