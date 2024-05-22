@extends('layouts.admin')

@section('title')
    <title>{{ $rolePage }}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminCF/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminCF/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminCF/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $dataTables,
        'page' => $rolePage,
        'link' => 'role.index',
    ])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="float-right btn btn-success"
                                href="{{ route('role.create') }}">{{ $add }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ $STT }}</th>
                                        <th>{{ $roleName }}</th>
                                        <th>{{ $roleDisplayName }}</th>
                                        <th>{{ $action }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>
                                                <a href="{{ route('role.edit', ['id' => $role->id]) }}"
                                                    class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger action_delete"
                                                    data-url="{{ route('role.destroy', ['id' => $role->id]) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th>{{ $STT }}</th>
                                        <th>{{ $roleName }}</th>
                                        <th>{{ $roleDisplayName }}</th>
                                        <th>{{ $action }}</th>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminCF/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminCF/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('adminCF/dist/js/demo.js') }}"></script> --}}
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "info": true,
                "searching": false,
                "buttons": ["csv", "excel", "pdf", "print"]
                // "paging": true, // Bật phân trang
                // "pageLength": 5, // Ssố lượng hàng trên mỗi trang
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
