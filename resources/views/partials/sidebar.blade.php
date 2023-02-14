<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link text-decoration-none">
        <img src="{{ asset('adminlte')}}/dist/img/klinik.png" alt="AdminLTE Logo" class="brand-image" >
      <span class="brand-text font-weight-medium "><b> KLINIK PRATAMA </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar User -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2 " alt="User Image">
        </div>
        <div class="info ">
          <a href="#" class="d-block text-decoration-none">{{ auth()->user()->name }}</a>
          <a href="#" class="text-decoration-none"><small><i class="fa fa-circle text-success "></i> Online</small></a>
        </div>
      </div>
      
    
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header text-xs">MAIN MENU</li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ ($title === "Dashboard")? 'active':''}}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> 
          </li>
         
          @if ((auth()->user()->role == 'admin') || (auth()->user()->role == 'kasir'))
          <li class="nav-item dropdown {{ Request::is('','')? 'menu-open':''}}">
            <a href="/transaksi" class="nav-link {{ Request::is('transaksi')? 'active':''}}" >
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview text-sm">
              <li class="nav-item">
                <a href="/transaksi/view" class="nav-link {{ Request::is('')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Transaksi Klinik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi.baru') }}" class="nav-link {{ Request::is('')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Klinik Baru</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link {{ Request::is('')? 'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Apotek</p>
                </a>
              </li> -->
            </ul>
          </li>
          @endif
          

          @if ((auth()->user()->role == 'dokter') || (auth()->user()->role == 'admin' || (auth()->user()->role == 'staf') ))
          <li class="nav-item">
            <a href="/rekam_medis" class="nav-link {{ Request::is('rekam_medis')? 'active':''}}">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Rekam Medis
              </p>
            </a>
          </li>
          @endif

          <li class="nav-header text-xs">MASTER</li>

          @if ((auth()->user()->role == 'staf') || (auth()->user()->role == 'admin'))
          <li class="nav-item dropdown {{ Request::is('dokter','bidan','perawat','analisiskesehatan','apoteker','administrasi')? 'menu-open':''}} ">
            <a href="/tenagakesehatan" class="nav-link {{ Request::is('dokter','bidan','perawat','analisiskesehatan','apoteker','administrasi')? 'active':''}} ">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Tenaga Kesehatan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview text-sm">
              <li class="nav-item">
                <a href="/dokter" class="nav-link {{ Request::is('dokter')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bidan" class="nav-link {{ Request::is('bidan')? 'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bidan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/perawat" class="nav-link {{ Request::is('perawat')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perawat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/analisiskesehatan" class="nav-link {{ Request::is('analisiskesehatan')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analisis Kesehatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/apoteker" class="nav-link {{ Request::is('apoteker')? 'active':''}}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Apoteker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/administrasi" class="nav-link {{ Request::is('administrasi')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrasi</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if ((auth()->user()->role == 'staf') || (auth()->user()->role == 'admin')|| (auth()->user()->role == 'dokter'))
          <li class="nav-item ">
            <a href="/pasien" class="nav-link {{ Request::is('pasien')? 'active':''}}">
              <i class="nav-icon fas fa-wheelchair"></i>
              <p>
                Pasien
                
              </p>
            </a>
          </li>
          @endif

        @if ((auth()->user()->role == 'apoteker') || (auth()->user()->role == 'admin'))
          <li class="nav-item {{ Request::is('dataobat','obatmasuk','obatkeluar','supplier')? 'menu-open':''}}">
            <a href="#" class="nav-link {{ Request::is('dataobat','obatmasuk','obatkeluar','supplier')? 'active':''}}" >
              <i class="nav-icon fas fa-medkit"></i>
              <p>
                Apotik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview text-sm">
              <li class="nav-item">
                <a href="/dataobat" class="nav-link {{ Request::is('dataobat')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/obatmasuk" class="nav-link {{ Request::is('obatmasuk')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Obat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/obatkeluar" class="nav-link {{ Request::is('obatkeluar')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Obat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/supplier" class="nav-link {{ Request::is('supplier')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          
        @if ((auth()->user()->role == 'staf') || (auth()->user()->role == 'admin'))
          <li class="nav-item">
            <a href="/inventaris" class="nav-link {{ Request::is('inventaris')? 'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Inventaris
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/lab" class="nav-link {{ Request::is('lab')? 'active':''}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Laboratorium
                
              </p>
            </a>
          </li>
        @endif

        @if ((auth()->user()->role == 'owner') || (auth()->user()->role == 'admin'))
        <li class="nav-header text-xs">REPORT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview text-sm">
                <li class="nav-item">
                  <a href="/lap_pasien" class="nav-link {{ Request::is('lap_pasien')? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Pasien</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/lap_pasien" class="nav-link {{ Request::is('lap_pasien')? 'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Pendapatan</p>
                  </a>
                </li>
            </ul>
          </li>
        </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>