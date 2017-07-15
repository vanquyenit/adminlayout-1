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
                            <li class="active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if(session('thongbao'))
                    <div class="alert alert-success alert_msg text-center">
                        {!! session('thongbao') !!}
                    </div>
                @endif
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">List User</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead>
                            <tr align="center" class="success">
                                <th class="text-center">STT</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0?>
                            @foreach($users as $value)
                                <?php $stt++ ?>
                                <tr class="odd gradeX" align="center">
                                    <td>{!! $stt !!}</td>
                                    <td>{!! $value["fullname"] !!}</td>
                                    <td>@if($value->level->id == 1)
                                            {!! "<span style='color:red; font-weight: bold'>Admin</span>" !!}
                                        @else
                                            {!! "<span style='color:black; font-weight: bold'>Member</span>" !!}
                                        @endif
                                    </td>
                                    <td>{!! $value->email !!}</td>
                                    <td class="center">
                                        <a href="{{ route('getUserEdit', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                                        <a href="{{ route('getUserDelete', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o  fa-fw"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    @endsection