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

    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
        <div class="card shadow mb-4" id="print1">
            <a href="#Identitas" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="Identitas">
                <h6 class="m-0 font-weight-bold text-primary">Identitas Pasien</h6>
            </a>
                <div class="collapse show" id="Identitas">
                    <div class="card-body">
                        <form class="user" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="Nama_Lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control " name="Nama_Lengkap" value="Abdul Somara" readonly>
                                </div>
                              <div class="col-sm-6">
                                <label for="Tanggal_Lahir">Tanggal lahir :</label>
                                <input type="date" class="form-control " name="Tanggal_Lahir"  value="1991-01-01" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="Alamat">Alamat</label>
                                    <input type="text" class="form-control " name="Alamat"  value="Garut indah sekali jaya tentrem abadi dan tak terlupakan" readonly>   
                                </div>
                                <div class="col-sm-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <input type="text" class="form-control " name="jk" value="Laki-laki" readonly> 
                                  </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="no_bpjs">No. BPJS</label>
                                    <input type="text" class="form-control " name="no_bpjs" value="1092811221" readonly>
                              </div>
                              <div class="col-sm-6">
                                <label for="no_handphone">No. Handphone</label>
                                <input type="text" class="form-control " name="no_handphone"  value="0918212111" readonly>
                              </div>
                            </div>
                        </form>
                                        
                    </div>
                </div>
        </div>
        <div id="print" class="card shadow mb-4">
            <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                <h6 class="m-0 font-weight-bold text-primary">Tagihan Kunjungan Pasien</h6>
            </a>
              <div class="collapse show" id="tambahrm">
                  <div class="card-body">
                      <div class="row mb-4">
                            <div class="col-sm-6">
                                  <h6 class="mb-3">Kepada:</h6>
                                <div>
                                    <strong>Nama Pasien</strong>
                                </div>
                                <div>Usia : 31 Tahun</div>
                                <div>Alamat : Bukittinggi</div>
                                <div>No. Hp: 081254908786</div>
                            </div>
                      </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th class="right">Harga Satuan</th>
                                        <th class="center">Kuantitas</th>
                                        <th class="right">Sub Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="center">1</td>
                                        <td class="left strong">Jasa Dokter</td>
                                        <td class="center">Rp 20.000,00</td>
                                        <td class="center">1</td>
                                        <td class="center">Rp 20.000,00</td>
                                      </tr>
                                      <tr>
                                        <th class="center"></th>
                                        <th>Jumlah Harga</th>
                                        <th class="right"></th>
                                        <th class="center"></th>
                                        <th class="right">Rp 170.000,00</th>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <a href="http://127.0.0.1:8000/rm"   class="btn btn-block btn-danger">
                                    <span class="icon"><i class="fa  fa-arrow-left" ></i></span><span class="text"> Kembali</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="javascript:;" data-toggle="modal" onclick="print()" data-target="#DeleteModal" class="btn btn-primary btn-block">
                                    <span class="icon"><i class="fa  fa-print" ></i></span><span class="text"> Cetak</span></a>
                                </div>
                            </div>
                  </div>
              </div>
        </div>
    </section>

    <!-- /.content -->
@endsection