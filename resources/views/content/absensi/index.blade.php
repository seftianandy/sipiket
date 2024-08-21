@extends('layouts.app', [
'pageTitle' => 'Absensi'
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
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
<div class="row" style="margin-bottom: 2em;">
    <div class="col-12">
        <button type="button" class="btn btn-md btn-secondary">
            <i class="fas fa-sync"></i>&nbsp; Reload Data
        </button>
        <button type="button" class="btn btn-md btn-dark" data-toggle="modal"
            data-target="#modal-importruang">
            <i class="fas fa-cloud-download-alt"></i>&nbsp; Download Absensi
        </button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="absensi-tab" data-toggle="pill"
                            href="#custom-tabs-absensi" role="tab" aria-controls="custom-tabs-absensi"
                            aria-selected="true">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="riwayat-tab" data-toggle="pill"
                            href="#custom-tabs-riwayat" role="tab" aria-controls="custom-tabs-riwayat"
                            aria-selected="false">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tigahari-tab" data-toggle="pill"
                            href="#custom-tabs-tigahari" role="tab" aria-controls="custom-tabs-tigahari"
                            aria-selected="false">Tidak Masuk 3 Hari Atau Lebih</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-absensi" role="tabpanel"
                        aria-labelledby="absensi-tab">

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-riwayat" role="tabpanel"
                        aria-labelledby="riwayat-tab">

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-tigahari" role="tabpanel"
                        aria-labelledby="tigahari-tab">
                        
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<!-- Import Data Ruang Kelas -->
<div class="modal fade" id="modal-importruang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Download Data Absensi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <label for="tipe-file">Tipe File</label>
                            <select class="form-control" name="tipe" id="tipe-file">
                                <option value="none">Pilih Tipe File</option>
                                <option value="pdf">PDF</option>
                                <option value="excel">xlsx</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="tipe-download">Tipe Download</label>
                            <select class="form-control" name="download" id="tipe-download">
                                <option value="none">PIlih Tipe Download</option>
                                <option value="personal">Personal</option>
                                <option value="kelas">Kelas</option>
                            </select>
                        </div>
                        <div class="form-group col-4" id="peserta-didik">
                            <label for="peserta-didik">Nama Peserta Didik</label>
                            <select class="form-control select2bs4" name="peserta-didik" style="width: 100%;">
                                <option value="none">Pilih Peserta Didik</option>
                                <option value="1">Seftian <span class="text-danger">(XI DPIB 3)</span></option>
                            </select>
                        </div>
                        <div class="form-group col-4" id="kelas">
                            <label for="kelas">Kelas</label>
                            <select class="form-control select2bs41" name="kelas" style="width: 100%;">
                                <option value="all">Semua Kelas</option>
                                <option value="1">XI DPIB 1</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="tipe-download">Waktu</label>
                            <div class="input-group">
                                <input type="text" class="form-control float-right" name="waktu" id="reservation">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Batal
                            </button>
                            <button type="button" class="btn btn-dark">
                                <i class="fas fa-cloud-download-alt"></i>&nbsp; Download Absen
                            </button>
                        </div>
                    </div>
                </form>
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
        <!-- Select2 -->
        <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('adminlte') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>

        <script src="{{ asset('assets') }}/absensi/absensi.js"></script>
    @endpush
