@extends('layouts.app', [
'pageTitle' => 'Jadwal Pelajaran'
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
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-md btn-dark" data-toggle="modal"
                    data-target="#modal-importjadwal">
                    <i class="fas fa-plus"></i>&nbsp; Tambah Jadwal Pelajaran
                </button>
            </div>
            {{-- <div class="card-header">
                <h4>Filter Data</h4>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control select2bs4" name="kelas" id="kelas" style="width: 100%;">
                                    <option value="none">Pilih Kelas</option>
                                    <option value="1">X DPIB 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control select2bs4" name="hari" id="hari" style="width: 100%;">
                                    <option value="all">Semua Hari</option>
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jum'at</option>
                                    <option value="6">Sabtu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn bg-navy" id="pencarian">
                            <i class="fas fa-filter"></i>&nbsp; Filter
                        </button>
                    </div>
                </div>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th class="text-center">HARI</th>
                            <th class="text-center">JAM KE</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">MATA PELAJARAN</th>
                            <th class="text-center">PENGAMPU</th>
                            <th class="text-center">RUANG KELAS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$item->hari->description}}</td>
                            <td class="text-center">
                                <strong>JAM KE - <span class="text-danger">{{$item->jam_pelajaran->jam_pelajaran}}</span></strong>
                            </td>
                            <td class="text-center">{{$item->rombongan_belajar->nama}}</td>
                            <td>{{$item->mata_pelajaran->mata_pelajaran}}</td>
                            <td>{{$item->guru->nama}}</td>
                            <td class="text-center">{{$item->ruangan->nama}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="hapus({{$item->id}}, 'Jadwal')">
                                    <i class="fas fa-times-circle"></i>&nbsp; Hapus
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
<div class="modal fade" id="modal-importjadwal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/jadwal-pelajaran">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jadwal Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="import-view">
                    <div class="form-group row">
                        <label for="data-siswa" class="col-sm-3 col-form-label">MATA PELAJARAN</label>
                        <div class="col-sm-9">
                            <select name="mata_pelajaran_id" class="form-control select2">
                                <option value="">-- PILIH MATA PELAJARAN</option>
                                @foreach ($mata_pelajaran as $mapel)
                                <option value="{{$mapel->id}}">{{$mapel->mata_pelajaran}} - {{$mapel->guru->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data-siswa" class="col-sm-3 col-form-label">KELAS</label>
                        <div class="col-sm-9">
                            <select name="rombongan_belajar_id" class="form-control select3">
                                <option value="">-- PILIH KELAS</option>
                                @foreach ($rombongan_belajar as $kelas)
                                <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data-siswa" class="col-sm-3 col-form-label">HARI</label>
                        <div class="col-sm-9">
                            <select name="hari_id" class="form-control select4">
                                <option value="">-- PILIH HARI</option>
                                @foreach ($hari as $haris)
                                <option value="{{$haris->id}}">{{$haris->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data-siswa" class="col-sm-3 col-form-label">RUANG</label>
                        <div class="col-sm-9">
                            <select name="ruang_id" class="form-control select5">
                                <option value="">-- PILIH RUANG</option>
                                @foreach ($ruang_kelas as $ruang)
                                <option value="{{$ruang->id}}">{{$ruang->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="data-siswa" class="col-sm-3 col-form-label">JAM PELAJARAN</label>
                        <div class="col-sm-9">
                            @foreach ($jam_pelajaran as $jam)
                            <div class="icheck-primary d-inline mr-5">
                                <input type="checkbox" name="jam_pelajaran_id[]" id="checkboxSuccess{{$jam->id}}" value="{{$jam->id}}">
                                <label for="checkboxSuccess{{$jam->id}}" class="mb-3">
                                    Jam Ke - {{$jam->jam_pelajaran}} <br>
                                    <small><code>{{$jam->description}}</code></small>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-betwee1n">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </form>
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
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('.select2').select2({
                theme: 'bootstrap4'
            })

            $('.select3').select2({
                theme: 'bootstrap4'
            })

            $('.select4').select2({
                theme: 'bootstrap4'
            })

            $('.select5').select2({
                theme: 'bootstrap4'
            })
        })

        function hapus(id, nama) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: true
            });

            swalWithBootstrapButtons.fire({
                title: "Hapus <span class='text-danger'>" + nama + "</span> ?",
                text: "Data jadwal pelajaran akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Hapus!",
                cancelButtonText: "No, Batalkan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request to delete the data
                    $.ajax({
                        url: '/jadwal-pelajaran/' + id, // URL menuju route destroy
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content') // Kirim CSRF token untuk keamanan
                        },
                        success: function (response) {
                            swalWithBootstrapButtons.fire({
                                title: "Berhasil!",
                                text: "Mata Pelajaran " + nama + " berhasil dihapus.",
                                icon: "success"
                            }).then(() => {
                                location
                            .reload(); // Reload halaman setelah sukses menghapus data
                            });
                        },
                        error: function (xhr) {
                            swalWithBootstrapButtons.fire({
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat menghapus data.",
                                icon: "error"
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
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
