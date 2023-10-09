@extends('layout/aplikasi')

@section('konten')
<div class="row">
  <div class="col-md-3 border border-dark rounded">
    <h3>Feature</h3>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Laki - laki
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <ul>
              <li><a href="" style="text-decoration: none;">Pakaian/ Celana</a></li>
              <li><a href="" style="text-decoration: none;">Baju Muslim</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Wanita
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <ul>
              <li><a href="" style="text-decoration: none;">Pakaian/ Celana</a></li>
              <li><a href="" style="text-decoration: none;">Baju Muslim</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Anak - anak
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <ul>
              <li><a href="" style="text-decoration: none;">Pakaian/ Celana</a></li>
              <li><a href="" style="text-decoration: none;">Baju Muslim</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-md-9">
  
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
  <a href="/siswa/create" class="btn btn-primary">Tambah Data</a>
    {{ $data->links() }}
</div>
</div>

  
@endsection