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
            <div class="row">
                <div class="col-md-12">
                    @if(session('thongbao'))
                        <div class="alert alert-success alert_msg text-center">
                            {!! session('thongbao') !!}
                        </div>
                    @endif
                </div>
            </div>
        <!-- /.col-lg-12 -->
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr class="danger">
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Category Parent</th>
                    <th class="text-center">ACtion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cate as $value)
                    <tr class="even gradeC" align="center">
                        <td>{!! $value->id !!}</td>
                        <td>{!! $value->name !!}</td>
                        <td>
                            @if($value->parent_id == 0)
                                {{ "None" }}
                            @else
                                <?php
                                $paren = DB::table('categories')->where('id', $value->parent_id)->first();
                                echo $paren->name;
                                ?>
                            @endif
                        </td>
                        <td class="center">
                            <a href="{{ route('getCateEdit', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="{{ route('getCateDelete', ['id' => $value->id] ) }}" onclick="return delcate('Bạn có muốn xóa thể loại?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o  fa-fw"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection