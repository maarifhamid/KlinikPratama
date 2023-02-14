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
                        <a href="/supplier/create" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                        </a>
                    </div>
                </div>
              <table class="table table-striped table-hover table-bordered table-md " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th width ='5%'>No</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telpon</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($supplier as $sup)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $sup->nama_supplier }}</td>
                        <td>{{ $sup->alamat }}</td>
                        <td>{{ $sup->no_telepon }}</td>
                        
                        <td><a href="/supplier/{{$sup->id}}/edit" class="badge bg-primary ">
                            <i class="fas fa-edit"></i>
                            </a>
                            <a href="/supplier/{{$sup->id}}" class="badge bg-danger ">
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