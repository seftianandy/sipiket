@extends('layouts.app', [
'pageTitle' => 'Ruang Kelas'
])

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" id="imporPdHeader">
                <button type="button" class="btn btn-md bg-dark" data-toggle="modal" data-target="#modal-importruang"
                    onclick="viewimport()">
                    <i class="fas fa-file-import"></i>&nbsp; Import Ruang Kelas
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th class="text-center">KODE</th>
                            <th class="text-center">RUANG KELAS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $item )
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->description}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="hapusRuang({{$item->id}}, {{$item->description}})">
                                    <i class="fas fa-times-circle"></i>&nbsp; Nonaktifkan
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>


<!-- Import Data Ruang Kelas -->
<div class="modal fade" id="modal-importruang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Ruang Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="import-view">

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

    @push('js')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
        </script>
        <script
            src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        </script>
        <script
            src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        </script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js">
        </script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
        </script>
        <script src="{{ asset('adminlte') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js">
        </script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js">
        </script>
        <script src="{{ asset('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js">
        </script>

        <!-- SweetAlert2 -->
        <script src="{{ asset('adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    @endpush

    @push('script')
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });

            function viewimport() {
                $.get("{{ url('ruang-kelas/import-view') }}", {}, function (data, status) {
                    $("#import-view").html(data)
                })
            }

            function hapusRuang(id, nama) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Nonaktifkan data ruang kelas <span class='text-danger'>" + nama + "</span> ?",
                    text: "Data ruang kelas akan dinonaktifkan !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Nonaktifkan!",
                    cancelButtonText: "No, Batalkan!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: "Berhasil!",
                            text: "Data ruang kelas " + nama + " berhasil dinonaktifkan.",
                            icon: "success"
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Dibatalkan",
                            text: "Data tidak diproses.",
                            icon: "error"
                        });
                    }
                });
            }

        </script>
    @endpush
