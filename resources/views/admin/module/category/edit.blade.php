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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
                <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category Edit</h3>
                    </div>
                    <div class="panel-body">
                        @include('admin.layouts.error')
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="sltParent">
                                    <option value="0">Please Choose Category</option>
                                    <?php cate_parent($parent,0,"--", $dataCate["parent_id"]);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName', isset($dataCate["name"]) ? $dataCate["name"] : null) !!}" />
                            </div>

                            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
                            <form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
