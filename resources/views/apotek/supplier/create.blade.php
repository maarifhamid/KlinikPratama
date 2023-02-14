@extends('layouts.main')

@section('content')


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

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                  {{ $title }}
                </div>
                <div class="card-body">
                <form class="row g-3 " action="/supplier" method="POST">
                    @csrf
                    <div class="col-md-6 ">
                        <label for="kode_supplier" class="form-label font-weight-normal">Kode Supplier</label>
                        <input type="text" class="form-control @error('kode_supplier') is-invalid @enderror" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier">
                        @error('kode_supplier')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="nama_supplier" class="form-label font-weight-normal">Nama Supplier</label>
                        <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier">
                        @error('nama_supplier')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="alamat" class="form-label font-weight-normal">Alamat</label>
                        <input type="adress" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat">
                        @error('alamat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="no_telepon" class="form-label font-weight-normal">Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Nomor Telepon">
                        @error('no_telepon')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
                      
                </div>
              </div>
        </div>
    </section>

@endsection