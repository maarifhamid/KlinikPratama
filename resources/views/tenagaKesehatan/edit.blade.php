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
                    <form action="/pegawai/update/{{ $tenagaKesehatan->id}}" method="post">
                      @csrf
                      @method('put')
                        <div class="row mb-3">
                          <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $tenagaKesehatan->nama_pegawai }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                                    <option value="0" selected disabled>Pilih</option>
                                        <option value="{{ $tenagaKesehatan->jenis_kelamin }}" @if (($tenagaKesehatan->jenis_kelamin) == "L") selected @endif>Laki-Laki</option>
                                        <option value="{{ $tenagaKesehatan->jenis_kelamin }}" @if (($tenagaKesehatan->jenis_kelamin) == "P") selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $tenagaKesehatan->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                              <input type="date"  class="form-control" name="tanggal_lahir" value="{{ $tenagaKesehatan->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="profesi_id" class="col-sm-2 col-form-label">Profesi</label>
                            <div class="col-sm-10">
                              <select class="form-select" name="profesi_id">
                                <option value="0" selected disabled>Pilih</option>
                                @foreach($profesi as $p)
                                    @if(old('profesi_id',$tenagaKesehatan->profesi_id) == $p->id)
                                        <option value="{{ $p->id }}" selected >{{ $p->nama_profesi }}</option>
                                    @else 
                                        <option value="{{ $p->id }}" >{{ $p->nama_profesi }}</option>
                                    @endif    
                                @endforeach
                                </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="spesialis" name="spesialis" value="{{ $tenagaKesehatan->spesialis }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $tenagaKesehatan->alamat}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_telpon" class="col-sm-2 col-form-label">Nomor Telpon</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $tenagaKesehatan->no_telp }}">
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