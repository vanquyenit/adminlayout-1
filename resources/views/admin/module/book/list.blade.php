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
                            <li class="active">Sách</li>
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
                    <th class="text-center">Hình Ảnh</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Danh Mục</th>
                    <th class="text-center">Tác Giả</th>
                    <th class="text-center">Nhà Phát Hành</th>
                    <th class="text-center">Trạng Thái</th>
                    <th class="text-center">Hành Động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($book as $value)
                    <tr class="even gradeC" align="center">
                        <td style="vertical-align: middle">{!! $value->id !!}</td>
                        <td style="vertical-align: middle"><img src="{!! asset('public/admin/image_book/'. $value->image) !!}" alt="image_book" height="100" width="75"></td>
                        <td style="vertical-align: middle">{!! $value->name !!}</td>
                        <td style="vertical-align: middle">{!! number_format($value->price,0,",",".")!!}  ₫</td>
                        <td style="vertical-align: middle">{!! $value->cate->name !!}</td>
                        <td style="vertical-align: middle">{!! $value->authors->name !!}</td>
                        <td style="vertical-align: middle">{!! $value->publishers->name !!}</td>
                        <td style="vertical-align: middle">
                            @if($value->public == 1)
                                <i class="fa fa-check-circle" aria-hidden="true" style="color: #00ff2d;"></i>
                            @else
                                <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: red;"></i>
                            @endif
                        </td>
                        <td class="center" style="vertical-align: middle">
                            <a href="{{ url('sach/'. $value->id .'/'.$value->slug ) }}" data-toggle="tooltip" data-placement="top" title="View" target="_blank"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                            <a href="{{ route('getBookEdit', ['id' => $value->id] ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="{{ route('getBookDelete', ['id' => $value->id] ) }}" onclick="return delcate('Bạn có muốn xóa thể loại?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o  fa-fw"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection