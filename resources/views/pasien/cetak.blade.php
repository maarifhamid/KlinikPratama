<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte')}}/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        
        .box {
            position: relative;
            padding: 10px;
            
        }
        .card {
            width: 85.60mm;
        }
        .logo {
            position: absolute;
            top: 3pt;
            right: 0pt;
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }
        .logo p {
            text-align: right;
            margin-right: 30pt;
            margin-top: 135pt;
            color: black !important;
            font-size: 10pt;
        }
        .logo img {
            position: absolute;
            margin-top: 15pt;
            margin-left: 10pt;
            width: 50px;
            height: 50px;
            right: 20pt;
        }
        .nama {
            position: absolute;
            top: 158pt;
            right: 30pt;
            font-size: 12pt;
            font-family:  Helvetica, sans-serif;
            font-weight: bold;
            color: black !important;
        }
        .telepon {
            position: absolute;
            top: 175pt;
            right: 30pt;
            font-size: 9pt;
            font-family:  Helvetica, sans-serif;
            font-weight: bold;
            color: black !important;
        }
        .barcode {
            position: absolute;
            top: 105pt;
            left: .860rem;
            border: 1px solid #fff;
            padding: .5px;
            background: #fff;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body >
    <section style="border: 1px solid #fff">
        <table  >
                <tr>
                    @foreach ($pasien as $item)
                        <td class="">
                            <div class="box " >
                                <img src="{{ asset('adminlte')}}/dist/img/kartu.jpeg" alt="container" width="450px" height="250px">
                                <div class="logo">
                                    
                                <img src="{{ asset('adminlte')}}/dist/img/klinik.png" width="400px" alt="logo" >
                                   
                                    <p>KARTU PASIEN</p>
                                </div>
                                <div class="nama">{{ $item->nama_pasien }}</div>
                                <div class="telepon"> {{ $item->alamat }}</div>
                            </div>
                        </td>
                        
                       
                    @endforeach
                </tr>
           
        </table>
    </section>
    <script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>