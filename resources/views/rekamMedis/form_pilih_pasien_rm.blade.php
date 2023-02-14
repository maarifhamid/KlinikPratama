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
            <div class="card-body text-sm ">
                
                <!-- <nav class="navbar navbar-light bg-white float-right">
                    <div class="container-fluid"> 
                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                </nav> -->
              <table class="table t table-hover table-bordered " id="tabel1">
                <thead class="table align-middle">
                  
                    <th scope="col">No</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir </th>
                    <th scope="col">Umur</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Aksi</th>
                    
                </thead>
                <tbody class="">
                @foreach ($pasien as $pas)
                    <tr>
                        <th scope="row" width="5%">{{ $loop->iteration }}</th>
                        <td>{{ $pas->nama_pasien }}</td>
                        <td>{{ $pas->jenis_kelamin }}</td>
                        <td>{{ tanggal_indonesia($pas->tanggal_lahir) }}</td>
                        <td>{{ $pas->umur }}</td>
                        <td>{{ $pas->no_telp }}</td>
                        
                        <td><a href="/tambah/form/rm/{{ $pas->id }}" class="btn bg-primary text-decoration-none ">
                            PILIH
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