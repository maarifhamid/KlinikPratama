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
        <div class="card">
          
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            
            <div class="card-body text-sm ">               

                  <div class="box-body table-responsive">
                    <table class="table  table-hover table-bordered table-mds" id="tabel1">
                      <thead >
                          <th width="5%">No</th>
                          <th >Tanggal</th>
                          <th >Kode Transaksi</th>
                          <th >Nama Pasien</th>
                          <th >Jumlah Item</th>
                          <th >Total Harga</th>
                          <th  width="15%"><i class="fa fa-cog"></i></th>
                      </thead>
                      <tbody class="">
                        @foreach ($dataTransaksi as $item)
                          <tr>
                            <th width="5%">{{ $loop->iteration }}</th>
                            <td>{{ tanggal_indonesia($item->created_at) }}</td>
                            <td>TR-{{ $item->id }}</td>
                            <td>{{ $item->pasien->nama_pasien ?? ''}}</td>
                            <td>{{ $item->total_item }}</td>
                            <td>Rp {{ format_uang($item->total_harga) }}</td>
                            
                            <td>
                                <a href="/transaksi/view/{{ $item->id }}" class="btn btn-success btn-sm " data-toggle="modal" data-target="#exampleModal">
                                  <i class="fas fa-eye"></i>
                                </a>    
                                <a href="/" class="btn btn-warning btn-sm  ">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <a href="/tambahDokter" class="btn btn-danger btn-sm  ">
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

          <!-- Modal Detail Transaksi -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                    <table class="table  table-hover table-bordered" id="tabel1">
                      <thead >
                          <th width="5%">No</th>
                          <th >Nama Jasa</th>
                          <th >Harga</th>
                          <th >Jumlah</th>
                          
                      </thead>
                      <tbody class="">
                        
                        <tr>
                          <th width="5%"></th>
                          <td></td>
                          <td></td>
                          <td></td>
                          
                        </tr>
                            
                        
                           
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
    

    </section>

    <!-- /.content -->
@endsection