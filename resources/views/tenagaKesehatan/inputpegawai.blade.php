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
                    <form action="/dokter/tambah" method="post">
                      @csrf
                        <div class="row mb-3">
                          <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" name="nama_pegawai">
                            
                            @error('nama_pegawai')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select id="jenis_kelamin" class="form-select " name="jenis_kelamin">
                                    <option value="0" selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir">
                              @error('tempat_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                              <input type="date"  class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                              @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profesi_id" class="col-sm-2 col-form-label">Profesi</label>
                            <div class="col-sm-10">
                              <select class="form-select" name="profesi_id">
                                <option value="0" selected>Pilih Profesi</option>
                                @foreach($profesi as $p)
                                  <option value="{{ $p->id }}" >{{ $p->nama_profesi }}</option>
                                @endforeach
                                </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis">
                              @error('spesialis')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                              @error('alamat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_telpon" class="col-sm-2 col-form-label">Nomor Telpon</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp">
                              @error('no_telp')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                      
                        <button type="submit" class="btn btn-md btn-primary  pull-right btn-simpan">
                          <i class="fas fa-floppy-o"></i>Simpan
                        </button>
                      </form>
                      
                </div>
              </div>
        </div>
    </section>

@endsection