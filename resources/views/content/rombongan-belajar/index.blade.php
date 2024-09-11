@extends('layouts.app', [
'pageTitle' => 'Rombongan Belajar'
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
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil !</h5>
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header" id="imporPdHeader">
                <button type="button" class="btn btn-md btn-dark" data-toggle="modal" data-target="#modal-rombel"
                    onclick="viewimport()">
                    <i class="fas fa-plus"></i>&nbsp; Tambah Rombongan Belajar
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th class="text-center">ROMBEL</th>
                            <th class="text-center">WALI KELAS</th>
                            <th class="text-center">JURUSAN</th>
                            <th class="text-center">TINGKAT</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->guru->nama}}</td>
                            <td>{{$item->jurusan->description}}</td>
                            <td class="text-center">{{$item->tingkat}}</td>
                            <td class="text-center">
                                <a href="anggota-rombel/{{$item->id}}" class="btn btn-sm btn-default">
                                    <i class="fas fa-users"></i>&nbsp; Anggota Rombel
                                </a>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="hapus({{$item->id}}, '{{$item->nama}}')">
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

<!-- Import Data Guru -->
<div class="modal fade" id="modal-rombel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/rombongan-belajar">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Rombongan Belajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="import-view">
                    <input type="hidden" name="semester_id" class="form-control" value="1">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">ROMBEL</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan Nama Rombongan Belajar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan_id" class="col-sm-3 col-form-label">JURUSAN</label>
                        <div class="col-sm-9">
                            <select name="jurusan_id" class="form-control select2">
                                <option value="">-- PILIH JURUSAN</option>
                                @foreach ($jurusan as $jurusans)
                                <option value="{{$jurusans->id}}">{{$jurusans->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tingkat" class="col-sm-3 col-form-label">TINGKAT</label>
                        <div class="col-sm-9">
                            <select name="tingkat" class="form-control">
                                <option value="">-- PILIH TINGKAT</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guru_id" class="col-sm-3 col-form-label">WALI KELAS</label>
                        <div class="col-sm-9">
                            <select name="guru_id" class="form-control select3">
                                <option value="">-- PILIH WALI KELAS</option>
                                @foreach ($guru as $walikelas)
                                <option value="{{$walikelas->id}}">{{$walikelas->nama}}</option>
                                @endforeach
                            </select>
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

    <!-- Select2 -->
    <script src="{{ asset('adminlte') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function(){
            // Setelah halaman siap
            setTimeout(function() {
                // Sembunyikan alert setelah 2 detik (2000 ms)
                $("#success-alert").fadeOut('slow');
            }, 2000); // 2000 ms = 2 detik
        })

        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('.select3').select2({
            theme: 'bootstrap4'
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
                title: "Hapus Rombongan Belajar <span class='text-danger'>" + nama + "</span> ?",
                text: "Data rombongan belajar akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Hapus!",
                cancelButtonText: "No, Batalkan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request to delete the data
                    $.ajax({
                        url: '/rombongan-belajar/' + id, // URL menuju route destroy
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content') // Kirim CSRF token untuk keamanan
                        },
                        success: function (response) {
                            swalWithBootstrapButtons.fire({
                                title: "Berhasil!",
                                text: "Rombongan belajar " + nama + " berhasil dihapus.",
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
