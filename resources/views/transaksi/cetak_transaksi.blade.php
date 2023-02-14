<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Print Transaksi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte')}}/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="container-fluid">

    
    <div class="row">
      <div class="col-12">
        <h2 class="page-header ">
            <img src="{{ asset('adminlte')}}/dist/img/klinik.png " width="80px" class="" alt="User Image">

          </i> Klinik Dokter Yanti
          <small class="float-right">{{ tanggal_indonesia(date('Y-m-d H:i:s')) }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
          <strong>{{ auth()->user()->role}}</strong><br>
          {{ auth()->user()->name}}<br>
        <address>
          Jl. Sersan Darphin No.96 A, Eka Jaya, Kec. Jambi Sel., Kota Jambi, Jambi 36135
        </address>
      </div><br>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <strong>{{ $transaksi->pasien->nama_pasien }}</strong><br>
        <address>
          {{ $transaksi->pasien->alamat }}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>Transaksi ID:</b> {{ $transaksi->id }}<br>
        <b>Account:</b> {{ auth()->user()->role}}<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped ">
          <thead>
          <tr>
            <th width="5%">No</th>
            <th>Kode Lab</th>
            <th>Jenis Periksa</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($detail as $item)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>LAB-{{ $item->lab_id}}</td>
              <td>{{ $item->lab->nama }}</td>
              <td>{{ $item->transaksi->total_item }}</td>
              <td>{{'Rp'. format_uang($item->sub_total) }}</td>   
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-8"></div>
      <!-- /.col -->
      <div class="col-4">

        <div class="table-responsive ">
          <table class="table table-striped">
            <tr>
              <th style="width:50%">Total Harga:</th>
              <td>{{'Rp'. $transaksi->total_harga }}</td>
            </tr>
            <tr>
              <th>Diterima</th>
              <td>{{'Rp'. format_uang($transaksi->diterima) }}</td>
            </tr>
            <tr>
              <th>Kembali</th>
              <td>{{'Rp'. format_uang($transaksi->diterima - $transaksi->total_harga) }}</td>
            </tr>
          </table>
        </div>
        
      </div>
      <br>
      <p class="text-center">================================================================================</p>
      <p class="text-center"> Klinik Pratama Dokter Yanti </p>
    </div>
    <!-- /.row -->
  </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
