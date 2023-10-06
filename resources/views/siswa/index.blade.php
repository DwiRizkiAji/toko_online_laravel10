@extends('layout/aplikasi')

@section('konten')

  <a href="/siswa/create" class="btn btn-primary">Tambah Data</a>
  <table class="table">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nomor Induk</th>
        <th>Nama</th>
        <th>Alamat</th>
        <td>Aksi</td>
      </tr>
    </thead>

    <tbody>
      @foreach ($data as $dt)
        <tr>
          <td>
            @if ($dt->foto)
                <img style="width: 70px;" src="{{ url('asset/foto').'/'. $dt->foto }}"/>
            @endif
          </td>
          <td>{{ $dt->nomor_induk }}</td>
          <td>{{ $dt->nama }}</td>
          <td>{{ $dt->alamat }}</td>
          <td>
            <a class="btn btn-secondary btn-sm" href="{{ url('/siswa/' . $dt->nomor_induk) }}">Detail</a>
            <a class="btn btn-warning btn-sm" href="{{ url('/siswa/' . $dt->nomor_induk.'/edit') }}">Edit</a>
            <form onclick="return confirm('Yakin Hapus?')" class="d-inline" action="{{ '/siswa/'. $dt->nomor_induk }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm ">Hapus Data</button>
            </form>
          </td>
          
        </tr>          
      @endforeach
    </tbody>
  </table>
    {{ $data->links() }}
@endsection