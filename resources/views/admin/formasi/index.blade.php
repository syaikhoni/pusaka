@extends('layouts.app')

@section('content')

<h1>Data Formasi</h1>

<a class="btn" href="/admin/formasi/create">Tambah Formasi</a>

<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Nama Formasi</th>
        <th>Kuota</th>
        <th>Lokasi</th>
        <th>Syarat</th>
        <th>Aksi</th>
    </tr>

```
@foreach($formasis as $formasi)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $formasi->nama_formasi }}</td>
    <td>{{ $formasi->kuota }}</td>
    <td>{{ $formasi->lokasi }}</td>
    <td>{{ $formasi->syarat }}</td>
    <td>
        <a href="/admin/formasi/{{ $formasi->id }}/edit">Edit</a>

        <form action="/admin/formasi/{{ $formasi->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
```

</table>

@endsection
