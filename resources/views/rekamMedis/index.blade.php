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
                        <a href="/tambah/form/rm" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                          </a>
                    </div>
                </div>
              <table class="table table-striped table-hover table-bordered table-md  " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th scope="col" width="5%">No</th>
                    <th scope="col" width="13%">Tanggal</th>
                    <th scope="col" width="5%">NRM</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Dianogsa</th>
                    <th scope="col">Jenis Periksa</th>
                    <th scope="col" width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($rekam_medis as $rm)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ tanggal_indonesia($rm->created_at) }}</td>
                        <td>RM-{{ $rm->id }}</td>
                        <td>{{ $rm->pasien->nama_pasien }}</td>
                        <td>{{ $rm->keluhan }}</td>
                        <td>{{ $rm->diagnosis }}</td>
                        <td>{{ $rm->jenis_periksa}}</td>
                        
                        <td><a href="/D" class="btn btn-warning ">
                            <i class="fas fa-edit"></i>
                            </a>
                            <a href="/tambahDokter" class="btn btn-danger ">
                                <i class="fas fa-trash"></i>
                                </a>
                                <a href="/tambah/form/rm/{{ $rm->pasien_id }}" class="btn btn-success">
                                    <i class="fas fa-stethoscope"></i>
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