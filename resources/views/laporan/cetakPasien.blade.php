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
                        <a href="/lap_pasien/cetak_pdf" class="btn btn-success float-right">
                            Cetak Laporan
                          </a>
                    </div>
                  </div>
        
              <table class="table table-striped table-hover table-bordered   " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th >No</th>
                    <th >Tanggal Periksa</th>
                    <th >Nama Pasien</th>
                    <th >Keluhan</th>
                    <th >Nama Dokter</th>
                    <th >Diagnosa</th>
                    <th ><i class="fa fa-cog"></th>
                  </tr>
                </thead>
                <tbody class="">
                
                    @foreach ($pasien as $pas)
                   
                    <tr>
                        <th width="5%">{{ $loop->iteration }}</th>
                        <td>{{ tanggal_indonesia($pas->created_at)}}</td>
                        <td>{{ $pas->pasien->nama_pasien}}</td>
                        <td>{{ $pas->keluhan}}</td>
                        <td>{{ $pas->dokter->nama_pegawai}}</td>
                        <td>{{ $pas->diagnosis }}</td>
                        <td>
                          <form action="/pasien/{{ $pas->id }}" method="get" class="d-inline">
                            
                            @csrf
                            <button class="btn btn-sm  bg-primary" >
                              <i class="fas fa-eye"></i>
                            </button>
                          </form>
                          <form action="/pasien/{{ $pas->id }}/edit" method="get" class="d-inline">
                            @csrf
                            <button class="btn btn-sm  bg-warning" >
                              <i class="fas fa-edit"></i>
                            </button>
                          </form>
                          <form action="/pasien/{{ $pas->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm  bg-danger" onclick="return confirm('Apakah Yakin Hapus Data ?')">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                          
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