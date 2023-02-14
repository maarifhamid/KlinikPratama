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
                        <a href="/lab/create" class="btn btn-primary float-right">
                            Tambah {{ $title }}
                        </a>
                    </div>
                </div>
              <table class="table table-striped table-hover table-bordered table-md" id="tabel1">
                <thead class="table align-middle">
                  <tr class="">
                    <th width="5%">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    
        
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">
                    
                    @foreach ($lab as $lab)
                    <tr>
                        <th width="5%" >{{ $loop->iteration }}</th>
                        <td>{{ $lab->nama }}</td>
                        <td>Rp {{ format_uang($lab->harga) }}</td>
                        
                        <td><form action="/lab/{{ $lab->id }}/edit" method="get"class="mb-1 d-inline" >
                            @csrf
                            <button class="btn bg-warning" >
                              <i class="fas fa-edit"></i>
                            </button>
                          </form>
                            <form action="/lab/{{ $lab->id }}" method="post" class="mb-1 d-inline" >
                            
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Apakah Yakin Hapus Data ?')">
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