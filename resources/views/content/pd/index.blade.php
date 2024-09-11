@extends('layouts.app', [
'pageTitle' => 'Peserta Didik'
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
                <button type="button" class="btn btn-md btn-dark" data-toggle="modal" data-target="#modal-importpd"
                    onclick="viewimport()">
                    <i class="fas fa-file-import"></i>&nbsp; Import Peserta Didik
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">NAMA</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">ALAMAT</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td class="text-center">{{$item->nisn}}</td>
                            <td class="text-center">{{$item->nis}}</td>
                            <td class="text-center">{{$item->jenis_kelamin}}</td>
                            <td>{{$item->alamat}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                    data-target="#modal-detil" onclick="detil({{$item->id}})">
                                    <i class="fas fa-info-circle"></i>&nbsp; Detil
                                </button>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="nonactivepd({{$item->id}}, '{{$item->nama}}')">
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

<!-- Detil Peserta Didik -->
<div class="modal fade" id="modal-detil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detil Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detil-siswa">

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

<!-- Import Data Peserta Didik -->
<div class="modal fade" id="modal-importpd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Data Peserta Didik</h4>
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

            function detil(id) {
                $.get("{{ url('peserta-didik/detil') }}/" + id, {}, function (data, status) {
                    $("#detil-siswa").html(data)
                })
            }

            function viewimport() {
                $.get("{{ url('peserta-didik/import-view') }}", {}, function (data, status) {
                    $("#import-view").html(data)
                })
            }

            function nonactivepd(id, nama) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Nonaktifkan PD a.n <span class='text-danger'>" + nama + "</span> ?",
                    text: "Data Peserta Didik akan dinonaktifkan !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Nonaktifkan!",
                    cancelButtonText: "No, Batalkan!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: "Berhasil!",
                            text: "Peserta Didik a.n " + nama + " berhasil dinonaktifkan.",
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
