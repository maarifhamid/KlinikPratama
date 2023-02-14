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
                <form class="row g-3 " action="/dataobat" method="POST">
                    @csrf
                    <div class="col-md-6 ">
                        <label for="nama_obat" class="form-label font-weight-normal">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
                        @error('nama_obat')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="keterangan" class="form-label font-weight-normal">Keterangan</label>
                        <input type="int" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan">
                        @error('keterangan')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="harga_beli" class="form-label font-weight-normal">Harga Beli</label>
                        <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        @error('harga_beli')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="harga_jual" class="form-label font-weight-normal">Harga Jual</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        @error('harga_jual')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="supplier_id" class="form-label font-weight-normal">Supplier</label>
                        <div class="col-sm-10">
                              <select class="form-select" name="supplier_id">
                                <option value="0" selected>Pilih Supplier</option>
                                @foreach($supplier as $sup)
                                  <option value="{{ $sup->id }}" >{{ $sup->nama_supplier }}</option>
                                @endforeach
                                </select>
                          </div>
                        @error('supplier_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="stok" class="form-label font-weight-normal">Stok</label>
                        <input type="number" valuemin="0" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="stok">
                        @error('stok')
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