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
                        <a href="/tambah/pegawai" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                          </a>
                    </div>
                  </div>
                
              <table class="table  table-hover table-bordered table-md " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th scope="col" width="5%">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Profesi</th>
                    <th scope="col">Spesialis</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telpon</th>
                    <th scope="col"><i class="fa fa-cog"></th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($tenagaKesehatan as $dok)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dok->nama_pegawai }}</td>
                        <td>{{ $dok->jenis_kelamin }}</td>
                        <td>{{ $dok->profesi->nama_profesi }}</td>
                        <td>{{ $dok->spesialis }}</td>
                        <td>{{ $dok->alamat }}</td>
                        <td>{{ $dok->no_telp }}</td>
                        <td>
                            <a href="/pegawai/edit/{{ $dok->id }}" class="btn btn-sm bg-warning ">
                              <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="/pegawai/hapus/{{ $dok->id }}" class="btn btn-sm  bg-danger" onclick="return confirm('Apakah Yakin Hapus Data ?')">
                              <i class="fas fa-trash"></i>
                            </a>
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