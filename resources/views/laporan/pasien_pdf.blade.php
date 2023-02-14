<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Pasien</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">

    
<div class="wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    @foreach ($pasien as $pas)
                    <small class="float-right">{{ date('Y-m-d H:i:s') }}</small>
                    @endforeach
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <strong>Laporan Pasien</strong><br>
                </div>
                <!-- /.col -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                    <th >No</th>
                    <th >Tanggal Periksa</th>
                    <th >Nama Pasien</th>
                    <th >Keluhan</th>
                    <th >Nama Dokter</th>
                    <th >Diagnosa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach ($pasien as $pas)
                   
                   <tr>
                       <th width="5%">{{ $loop->iteration }}</th>
                       <td>{{ tanggal_indonesia($pas->created_at)}}</td>
                       <td>{{ $pas->pasien->nama_pasien}}</td>
                       <td>{{ $pas->keluhan}}</td>
                       <td>{{ $pas->dokter->nama_pegawai}}</td>
                       <td>{{ $pas->diagnosis }}</td>
                       <td>
                    </tr>
                    </tbody>
                    @endforeach  
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
</body>
</html>
