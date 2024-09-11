@foreach ($data as $item)
    <tr>
        <td>{{$item->nip}}</td>
        <td>{{$item->nama}}</td>
        <td class="text-center">{{$item->jenis_kelamin}}</td>
        <td class="text-center">
            <button type="button" class="btn btn-sm btn-danger"
                onclick="nonactivepd('{{$item->guru_id}}', '{{$item->nama}}')">
                <i class="fas fa-times-circle"></i>&nbsp; Nonaktifkan
            </button>
        </td>
    </tr>
@endforeach
