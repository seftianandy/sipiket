$(function () {
    $("#example1").DataTable()
});

function viewimport() {
    $.ajax({
        type: "get",
        url: "tahun-ajaran/import-view",
        success: function (data) {
            console.log('load success')
            $("#import-view").html(data)
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    })
}

function nonactivepd(id, nama) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-dark",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
    });
    swalWithBootstrapButtons.fire({
        title: "Nonaktifkan Tahun Ajaran <span class='text-danger'>" + nama + "</span> ?",
        text: "Data Tahun Ajaran akan dinonaktifkan !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Nonaktifkan!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Berhasil!",
                text: "Tahun Ajaran " + nama + " berhasil dinonaktifkan.",
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
