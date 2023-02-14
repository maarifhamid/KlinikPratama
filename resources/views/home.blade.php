@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <h5>Selamat Datang, <span>{{ auth()->user()->name }}<span> Di Klinik Pratama Dokter Yanti</h5>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-wheelchair"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pasien</span>
                <span class="info-box-number">{{$pasien->count()}}</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-user-md"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Dokter</span>
                <span class="info-box-number">{{ $dokter->count() }}</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-medkit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Obat</span>
                  <span class="info-box-number">{{$obat->count()}}</span>
                </div>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa fa-heartbeat"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Transaksi</span>
                  <span class="info-box-number">{{$transaksi->count()}}</span>
                </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection