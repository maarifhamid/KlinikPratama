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
          
    <section class="content mt-4">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>

            <div class="card-body  ">
            @foreach ($data_pasien as $pas)
                    <form class="user" action="">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Nama_Lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control " name="Nama_Lengkap" value="{{$pas ->nama_pasien}}" readonly>
                            </div>
                          <div class="col-sm-6">
                            <label for="Tanggal_Lahir">Tanggal lahir :</label>
                            <input type="date" class="form-control " name="Tanggal_Lahir"  value="{{$pas ->tanggal_lahir}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control " name="Alamat"  value="{{$pas ->alamat}}" readonly>   
                            </div>
                            <div class="col-sm-6">
                                <label for="umur">Umur</label>
                                <input type="text" class="form-control " name="umur" value="{{$pas ->umur}}" readonly> 
                              </div>
                            </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="jk">Jenis Kelamin</label>
                                <input type="text" class="form-control " name="jk" value="{{$pas ->jenis_kelamin}}" readonly>
                          </div>
                          <div class="col-sm-6">
                            <label for="no_handphone">No. Handphone</label>
                            <input type="text" class="form-control " name="no_handphone"  value="{{$pas ->no_telp}}" readonly>
                          </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
                
            <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Jejak Rekam Medis</h3>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-start mb-3"> 
                          <div class="col">
                            @foreach ($data_pasien as $pas)
                              <a href="/tambah/form/rm/{{$pas->id}}/view" class="btn btn-primary float-right">
                                {{ $title }}
                              </a>
                            @endforeach
                          </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered table-md  " id="tabel1">
                          <thead class="table align-middle">
                            <tr class="">
                              <th scope="col" width="5%">No</th>
                              <th scope="col">NRM</th>
                              <th scope="col">Nama Pasien</th>
                              <th scope="col">Keluhan</th>
                              <th scope="col">Diagnosis</th>
                              <th scope="col">Resep</th>
                              <th scope="col">Jenis Periksa</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                        <tbody class="">
                            @foreach ($data_rm as $rm)
                            <tr>
                                <th width="5%">{{ $loop->iteration }}</th>
                                <td width = "5%">RM-{{ $rm->id }}</td>
                                <td>{{ $rm->pasien->nama_pasien}}</td>
                                <td>{{ $rm->keluhan }}</td>
                                <td>{{ $rm->diagnosis}}</td>
                                <td width ="15%">{{ $rm->resep }}</td>
                                <td width ="15%">{{ $rm->jenis_periksa}}</td>
                                <td width="15%">{{ tanggal_indonesia($rm->created_at) }}</td>
                                
                                <td width="10%">
                                  <a href="#" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="#" class="btn btn-danger">
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

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
        
        </div>
    </section>

    <!-- /.content -->
@endsection