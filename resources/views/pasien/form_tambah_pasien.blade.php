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
                <form class="row g-3 " action="/pasien" method="POST">
                    @csrf 
                    <div class="col-md-4 ">
                        <label for="nama_kk" class="form-label font-weight-normal">Nama Kartu Keluarga</label>
                        <input type="text" class="form-control @error('nama_kk') is-invalid @enderror" id="nama_kk" name="nama_kk" placeholder="Nama Kartu Keluarga">
                        @error('nama_kk')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-4 ">
                        <label for="nama_pasien" class="form-label font-weight-normal">Nama Pasien</label>
                        <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien">
                        @error('nama_pasien')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-4 ">
                        <label for="jenis_kelamin" class="form-label font-weight-normal">Jenis Kelamin</label>
                        <select id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                        <option selected>Choose...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <label for="no_identitas" class="form-label font-weight-normal">Nomor Identitas</label>
                        <input type="text" class="form-control @error('no_identitas') is-invalid @enderror" id="no_identitas" name="no_identitas" placeholder="Nomor Identitas">
                        @error('no_identitas')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-4 ">
                        <label for="tempat_lahir" class="form-label font-weight-normal">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        @error('tempat_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-2 ">
                        <label for="tanggal_lahir" class="form-label font-weight-normal">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>
                    <div class="col-md-2 ">
                        <label for="umur" class="form-label font-weight-normal">Umur</label>
                        <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" placeholder="Umur">
                        @error('umur')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-4 ">
                        <label for="inputEmail4" class="form-label font-weight-normal">Agama</label>
                        <select id="agama" class="form-select" name="agama">
                            <option selected>Choose...</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                        </select>
                    </div> 
                    <div class="col-md-4 ">
                        <label for="no_telp" class="form-label font-weight-normal">No Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" placeholder="No Telepon">
                        @error('no_telp')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                                     
                    <div class="col-12">
                        <label for="alamat" class="form-label font-weight-normal">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat">
                        @error('alamat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kelurahan" class="form-label font-weight-normal">Kelurahan</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
                        @error('kelurahan')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="rtrw" class="form-label font-weight-normal">RT/RW</label>
                        <input type="text" class="form-control @error('rt_rw') is-invalid @enderror" id="rt_rw" name="rt_rw" placeholder="RT/RW">
                        @error('rt_rw')
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