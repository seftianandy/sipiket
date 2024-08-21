<table border="1">
    <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->kelas}}</td>
        <td>
            <button id="editData" data-id="{{$item->id}}" onclick="show({{$item->id}})">Edit</button>
            <button id="deleteData" data-id="{{$item->id}}" onclick="destroy({{$item->id}})">Hapus</button>
        </td>
    </tr>
    @endforeach
</table>
