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
                            <li class="active">Author</li>
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
                <table class="table table-bordered table-hover " id="dataTables-example">
                    <thead>
                    <tr align="center" class="success">
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên Tác Giả</th>
                        <th class="text-center">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0?>
                    @foreach($publisher as $value)
                        <?php $stt++ ?>
                        <tr class="odd gradeX" align="center">
                            <td>{!! $stt !!}</td>
                            <td>{!! $value["name"] !!}</td>
                            <td class="center">
                                <a href="" data-toggle="tooltip" data-placement="top" title="View" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                                <a href="{{ route('getAuthorEdit', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                                <a href="{{ route('getAuthorDelete', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o  fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        </div>
    @endsection