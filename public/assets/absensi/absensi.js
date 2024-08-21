$(document).ready(function () {
    viewabsensi()
    viewriwayat()
    viewtigahari()

    $("#example1").DataTable();

    //Initialize Select2 Elements
    $('.select2').select2()

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs41').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs42').select2({
        theme: 'bootstrap4'
    })
    $('.select2bs43').select2({
        theme: 'bootstrap4'
    })

    //Date range picker
    $('#reservation').daterangepicker()

    $('#kelas').hide();
    $('#peserta-didik').hide();

    $('#tipe-download').change(function () {
        if ($(this).val() === 'kelas') {
            $('#peserta-didik').hide();
            $('#kelas').show();
        } else if ($(this).val() === 'personal') {
            $('#kelas').hide();
            $('#peserta-didik').show();
        } else {
            $('#kelas').hide();
            $('#peserta-didik').hide();
        }
    });
})

function viewabsensi() {
    $.get("absensi/dataabsensi", {}, function (data, status) {
        $("#custom-tabs-absensi").html(data)
    })
}

function viewriwayat() {
    $.get("absensi/datariwayatabsensi", {}, function (data, status) {
        $("#custom-tabs-riwayat").html(data)
    })
}

function viewtigahari() {
    $.get("absensi/datatigahari", {}, function (data, status) {
        $("#custom-tabs-tigahari").html(data)
    })
}

function batalAbsensi(id, nama) {
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
