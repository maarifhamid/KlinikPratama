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
                
                <form class="row g-3 " action="/rm/simpan" method="POST">
                    @method('get')
                    @csrf
                    @foreach ($data_pasien as $pas)
                        <input type="hidden" value="{{ $pas->id }}" name="pasien_id">
                    @endforeach
                    <div class="col-md-6 ">
                        <label for="pagawai_id" class="form-label font-weight-normal">Nama Dokter</label>
                        <select class="form-select" name="pegawai_id">
                                <option value="0" selected>Pilih Dokter</option>
                                @foreach($dokter as $dok)
                                  <option value="{{ $dok->id }}" >{{ $dok->nama_pegawai }}</option>
                                @endforeach
                                </select>
                    </div>
                    <div class="col-md-6 ">
                        <label for="keluhan" class="form-label font-weight-normal">Keluhan</label>
                        <input type="text" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" placeholder="Keluhan">
                        @error('keluhan')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md ">
                        <label for="gejala" class="form-label font-weight-normal">Gejala</label>
                        <input type="text" class="form-control @error('gejala') is-invalid @enderror" id="gejala" name="gejala" placeholder="Gejala">
                        @error('gejala')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    
                    <div class="col-md ">
                        <label for="diagnosis" class="form-label font-weight-normal">Diagnosis</label>
                        <input type="text" class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" name="diagnosis" placeholder="Diagnosis">
                        @error('diagnosa')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md ">
                        <label for="jenis_periksa" class="form-label font-weight-normal">Jenis Periksa</label>
                        <input type="text" class="form-control @error('jenis_periksa') is-invalid @enderror" id="jenis_periksa" name="jenis_periksa" placeholder="Jenis Periksa">
                        @error('diagnosa')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-12 ">
                        <label for="resep" class="form-label font-weight-normal">Resep Obat</label>
                        <input type="text"   class="form-control @error('resep') is-invalid @enderror" id="resep" name="resep" placeholder="Resep">
                        @error('resep')
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