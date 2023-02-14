@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- Untuk Judul --}}
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('success'))
    <div class="content">
      <div class="container-fluid">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      </div>
    </div>
    @endif
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body text-sm ">
                <div class="row align-items-start mb-3">
                    
                    <div class="col">
                        <a href="/pasien/create" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                          </a>
                    </div>
                  </div>
        
              <table class="table table-striped table-hover table-bordered table-md" id="tabel1">
                <thead class="table align-middle">
                  <tr >
                    <th >No</th>
                    <th >Nama</th>
                    <th >Jenis Kelamin</th>
                    <th >Alamat</th>
                    <th >Kelurahan</th>
                    <th >Umur</th>
                    <th >Nomor Telepon</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody >
                    @foreach ($pasien as $pas)
                    <tr>
                        <td width="2%">{{ $loop->iteration }}</td>
                        <td>{{ $pas->nama_pasien}}</td>
                        <td>{{ $pas->jenis_kelamin}}</td>
                        <td>{{ $pas->alamat }}</td>
                        <td>{{ $pas->kelurahan }}</td>
                        <td>{{ $pas->umur }} Tahun</td>
                        <td>{{ $pas->no_telp}}</td>
                        
                        <td width="15%">
                          <form action="/pasien/{{ $pas->id }}/edit" method="get"class="mb-1 d-inline" >
                            @csrf
                            <button class="btn bg-warning" >
                              <i class="fas fa-edit"></i>
                            </button>
                          </form>
                          <form action="/pasien/{{ $pas->id }}" method="post" class="mb-1 d-inline" >
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah Yakin Hapus Data ?')">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                          
                          <a href="/pasien/cetak_member/{{$pas->id}}" rel="noopener" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i></a>
                          <a href="/tambah/form/rm/{{ $pas->id }}" class="btn btn-primary"><i class="fas fa-stethoscope"></i></a>
                        </td> 
                      </tr> 
                    @endforeach  
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>

    <!-- /.content -->
@endsection
