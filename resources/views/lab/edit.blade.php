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
                <form class="row g-3 " action="/lab/{{ $laboratorium->id }}" method="post">
                    @csrf
                    <div class="col-md-6 ">
                        <label for="nama" class="form-label font-weight-normal">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ $laboratorium->nama }}">
                        @error('nama')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="harga" class="form-label font-weight-normal">Harga</label>
                        <input type="int" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Harga" value="{{$laboratorium->harga}}">
                        @error('harga')
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