
<script src="{!! asset('public/admin/bootstrap/js/bootstrap.min.js') !!}"></script>
{{--<script src="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>--}}
{{--<!-- Slimscroll -->--}}
{{--<script src="{!! asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>--}}
<!-- AdminLTE App -->
<script src="{!! asset('public/admin/dist/js/app.min.js') !!}"></script>
<script src="{!! asset('public/js/myscript.js') !!}"></script>

<script type="text/javascript" src="{{ asset('public/js/smoothscroll.js') }}"></script>


<script src="{{ asset('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
<script>
    $('#dataTables-example').DataTable( {
        "language": {
            "lengthMenu": "Hiển thị _MENU_ kết quả trên 1 trang",
            "zeroRecords": "Đang tải dữ liệu ...",
            "info": "Trang _PAGE_ của tổng _PAGES_ trang",
            "infoEmpty": "Không có dữ liệu",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
                "first":  "Đầu",
                "last": "Cuối",
                "next": "Sau",
                "previous": "Trước"
            },
            "search": "Tìm kiếm:",
        }
    });

</script>
</body>
</html>
