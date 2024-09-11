$(document).ready(function(){
    read()

    // $("#example1").DataTable()
})

function read() {
    $.ajax({
        type: "get",
        url: "gtk/read",
        success: function (data) {
            console.log('load success')
            $(".loadData").html(data)
            $('#example1').DataTable().destroy();
            $('#example1').DataTable();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    })
}

function viewimport() {
    $.ajax({
        type: "get",
        url: "gtk/import-view",
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
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
    });
    swalWithBootstrapButtons.fire({
        title: "Nonaktifkan Guru a.n <span class='text-danger'>" + nama + "</span> ?",
        text: "Data Guru akan dinonaktifkan !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Nonaktifkan!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Berhasil!",
                text: "Guru a.n " + nama + " berhasil dinonaktifkan.",
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
