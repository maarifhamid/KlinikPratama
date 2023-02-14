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
                        <a href="/inventaris/create" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                        </a>
                    </div>
                </div>
              <table class="table table-striped table-hover table-bordered table-md  " id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th width="5%">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Keterangan</th>
        
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($inventaris as $inven)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $inven->kode_barang }}</td>
                        <td>{{ $inven->nama_barang }}</td>
                        <td>{{ $inven->keterangan }}</td>
                        <td>
                          <form action="/inventaris/{{ $inven->id }}/edit" method="get"class="mb-1 d-inline" >
                            @csrf
                            @method('put')
                            <button class="btn btn-warning btn-sm " >
                              <i class="fas fa-edit"></i><span></span>
                            </button>
                          </form>
                          <form action="/inventaris/{{ $inven->id }}" method="get"class="mb-1 d-inline" >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger " onclick="return confirm('Apakah Yakin Hapus Data ?')" >
                              <i class="fas fa-trash"></i><span></span>
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