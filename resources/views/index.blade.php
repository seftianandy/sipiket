<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Kelas</h2>
    <form id="tambahData" class="inputData">
        <input type="text" name="id" id="id">
        <input type="text" name="kelas" id="kelas" placeholder="tambah kelas">
        <button type="submit">Simpan</button>
    </form>
    <br>
    <br>
    <br>
    <div id="loadData"></div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            read()
        })

        $("#tambahData").on("submit", function(e){
            e.preventDefault();
            let formData = $(this).serialize()
            store(formData)
        })

        $(".inputData").on("submit", function(e){
            e.preventDefault();
            let formData = $(this).serialize()
            update(formData)
        })

        function read(){
            $.get("{{url('read')}}", {}, function(data, status){
                $("#loadData").html(data)
            })
        }

        function store(formData){
            $.ajax({
                type: "post",
                url: "{{url('store')}}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                    read()
                    console.log("sukses");
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Error:", errorThrown);
                }
            })
        }

        function show(id){
            $.ajax({
                type: "post",
                url: "{{url('show')}}",
                data: {
                    id:id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (data) {
                    $("#id").val(data.id);
                    $("#kelas").val(data.kelas);
                    $("#simpanData")
                },
            })
        }

        function update(formData){
            $.ajax({
                type: "post",
                url: "{{ url('update') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (data) {
                    $("#id").val('');
                    $("#kelas").val('');
                },
            })
        }

        function destroy(id){
            $.ajax({
                type: "DELETE",
                url: "{{ url('destroy') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                    read()
                    console.log("sukses");
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Error:", errorThrown);
                }
            });
        }
    </script>
</body>
</html>
