@extends('admin.layouts.master')
@section('main')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <i class="fa fa-home" aria-hidden="true"></i> &nbsp;
                        <ol class="breadcrumb" style="display: inline">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Category</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2" style="padding-bottom:120px">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category Add</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert_msg">
                                <ul>
                                    @foreach($errors->all() as $er)
                                        <li>{{ $er }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('getCateAdd') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="sltParent">
                                    <option value="0">Please Choose Category</option>
                                    <?php cate_parent($parent);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop