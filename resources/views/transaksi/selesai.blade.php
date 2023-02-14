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
                  <div class="alert alert-success alert-dismissible">
                      <i class="fa fa-check icon"></i>
                          Data Transaksi telah selesai.
                  </div>
                      
                  <div class="box-footer mr-2">
                      <a href="{{ route('transaksi.nota') }}" rel="noopener" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print Struk</a>
                      <a href="{{ route('transaksi.baru') }}" class="btn btn-warning  "><i class="fas fa-new"></i> Transaksi Baru</a>     
                      <a href="{{ route('transaksi.daftar') }}" class="btn btn-primary ">Daftar Transaksi</a>     
                  </div>
              </div> 
          </div>  
       </div>

         

    </section>

    <!-- /.content -->
@endsection
@push('scripts')
<script>
    // tambahkan untuk delete cookie innerHeight terlebih dahulu
    document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    function cetakNota(url, title) {
        popupCenter(url, title, 625, 500);
    }

    function notaBesar(url, title) {
        popupCenter(url, title, 900, 675);
    }

    function popupCenter(url, title, w, h) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title, 
        `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
</script>
@endpush