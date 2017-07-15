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
            <div class="col-lg-12" style="padding-bottom:120px">
                @include('admin.layouts.error')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Book Add</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('getBookAdd') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="form-control" name="sltParent">
                                    <option value="0">Please Choose Category</option>
                                    <?php cate_parent($parent, old('sltCate'))?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Sách</label>
                                <input class="form-control" name="txtBookName" placeholder="Please Enter Category Name" value="{{ old('txtBookName')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tác Giả</label>
                                {{--<input class="form-control" name="txtAuthorName" placeholder="Please Enter Author Name" value="{{ old('txtAuthorName')}}"/>--}}
                                <select name="txtAuthorName" class="form-control">
                                    @foreach($author as $value)
                                        <option value="{!! $value->id !!}"> -- {!! $value->name !!} --</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{ old('txtPrice')}}"/>
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea name="txtDescription" rows="2" class="form-control">{{ old('txtDescription')}}</textarea>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace('txtDescription',{
                                        language:'vi',
                                        filebrowserImageBrowseUrl : '../../public/admin/plugin/ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl : '../../public/admin/plugin/ckfinder/ckfinder.html?Type=Flash',
                                        filebrowserImageUploadUrl : '../../public/admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl : '../../public/admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',});
                                </script>
							
                            </div>
                            <div class="form-group">
                                <label>Nhà Phát Hành</label>
                                {{--<input class="form-control" name="txtPublisher" placeholder="Please Enter Publisher" value="{{ old('txtPublisher')}}"/>--}}
                                <select name="publisher" class="form-control">
                                    @foreach($publisher as $value)
                                        <option value="{!! $value->id !!}"> -- {!! $value->name !!} --</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label>Nội Dung</label>--}}
                            {{--<textarea name="txtBookContent" rows="5" class="form-control">{{ old('txtBookContent')}}</textarea>--}}
                            {{--<script type="text/javascript">--}}
                            {{--var editor = CKEDITOR.replace('txtBookContent',{--}}
                            {{--language:'vi',--}}
                            {{--filebrowserImageBrowseUrl : '../../public/admin/plugin/ckfinder/ckfinder.html?Type=Images',--}}
                            {{--filebrowserFlashBrowseUrl : '../../public/admin/plugin/ckfinder/ckfinder.html?Type=Flash',--}}
                            {{--filebrowserImageUploadUrl : '../../public/admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',--}}
                            {{--filebrowserFlashUploadUrl : '../../public/admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',});--}}
                            {{--</script>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="content_img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <select name="rdoLevel" id="inputID" class="form-control">
                                    <option value="1"> -- Hiện --</option>
                                    <option value="0"> -- Ẩn --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số Lượng</label>
                                <input type="number" name="number_book" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số Trang</label>
                                <input type="number" name="pages_number" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Book</button>
                            <form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
@stop