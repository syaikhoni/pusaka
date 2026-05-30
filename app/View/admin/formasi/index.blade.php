<h1>Data Formasi</h1>

<a href="/admin/dashboard">Kembali</a> |
<a href="/admin/formasi/create">Tambah Formasi</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Formasi</th>
        <th>Kuota</th>
        <th>Lokasi</th>
        <th>Syarat</th>
        <th>Aksi</th>
    </tr>

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
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>