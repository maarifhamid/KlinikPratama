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
                
              <table class="table table-striped table-hover table-bordered table-md " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Keluar</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Jumlah Keluar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($obatKeluar as $obat)
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td><a href="/tambahDokter" class="badge bg-primary ">
                            <i class="fas fa-edit"></i>
                            </a>
                            <a href="/tambahDokter" class="badge bg-danger ">
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