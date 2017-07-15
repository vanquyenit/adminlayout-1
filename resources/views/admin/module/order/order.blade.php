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
                            <li class="active">Order</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="padding-bottom:120px">
                <table class="table table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr class="danger">
                        <th class="text-center">ID</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $value)
                        <tr class="even gradeC" align="center">
                            <td style="vertical-align: middle">{!! $value->id !!}</td>
                            <td style="vertical-align: middle">{!! $value->fullname !!}</td>
                            <td style="vertical-align: middle">{!! $value->address !!}</td>
                            <td style="vertical-align: middle">{!! $value->date !!}</td>
                            <td style="vertical-align: middle">
                                @if( $value->status == 0)
                                    <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: red;"></i>
                                @else
                                    <i class="fa fa-check-circle" aria-hidden="true" style="color: #00ff2d;"></i>
                                @endif
                            </td>
                            <td style="vertical-align: middle">
                                <a href="{{ route('getOrderDetail', ['id' => $value->id]) }}" data-toggle="tooltip" data-placement="top" title="View Detail" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                                <a href="{{ route('getDeleteOrder', ['id' => $value->id] ) }}" onclick="return delcate('Bạn có muốn xóa thể loại?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o  fa-fw"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop