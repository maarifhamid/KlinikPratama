@extends('layouts.main')
@push('css')
<style>
    .tampil-bayar {
        font-size: 3em;
        text-align: center;
        height: 100px;
    }

    .tampil-terbilang {
        padding: 10px;
        background: #f0f0f0;
    }

    .table-transaksi tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .tampil-bayar {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<!-- BAGIAN TRANSAKSI -->
<div class="card-body">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                
                <form class="form-lab" action="">
                    @csrf
                    <div class="form-group row">
                        <label for="id_lab" class="col-lg-2">Kode Lab</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input type="hidden" name="transaksi_berobat_id" id="transaksi_berobat_id" value="{{ $id_transaksi }}">
                                <input type="hidden" name="id_lab" id="id_lab">
                                <input type="text" class="form-control" name="harga" id="harga">
                                <span class="input-group-btn">
                                    <button onclick="tampilKlinik()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-stiped table-bordered table-transaksi">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th width="15%">Jumlah</th>
                        <th>Subtotal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="tampil-bayar bg-primary"></div>
                        <div class="tampil-terbilang"></div>
                    </div>
                    <div class="col-lg-4">
                        
                        <form action="{{ route('transaksi.simpan') }}" class="form-transaksi" method="post">
                            @csrf
                            <input type="hidden" name="transaksi_berobat_id" value="{{ $id_transaksi }}">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="bayar" id="bayar">
                            <input type="hidden" name="pasien_id" id="pasien_id" value="{{ $memberSelected->pasien_id }}">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-4 control-label">Total</label>
                                <div class="col-lg-8">
                                    <input type="text" id="totalrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pasien_id" class="col-lg-4 control-label">Pasien</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nama_pasien" value="{{ $memberSelected->nama_pasien }}">
                                        <span class="input-group-btn">
                                            <button onclick="tampilPasien()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="bayarrp" class="col-lg-4 control-label">Bayar</label>
                                <div class="col-lg-8">
                                    <input type="text" id="bayarrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diterima" class="col-lg-4 control-label">Diterima</label>
                                <div class="col-lg-8">
                                    <input type="number" id="diterima" class="form-control" name="diterima" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kembali" class="col-lg-4 control-label">Kembali</label>
                                <div class="col-lg-8">
                                    <input type="text" id="kembali" name="kembali" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
            </div>
        </div>
    </div>
</div>
<!-- END TRANSAKSI -->
                
                               
            </div>  
        </div>

          
    

    </section>
    <!-- /.content -->
    
@includeIf('transaksi_detail.klinik')
@includeIf('transaksi_detail.pasien')
@endsection

@push('scripts')
<script>
    let table, table2;

    $(function () {

        table = $('.table-transaksi').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data', $id_transaksi) }}',
                
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false },
                {data: 'nama'},
                {data: 'harga'},
                {data: 'jumlah'},
                {data: 'sub_total'},
                {data: 'aksi', searchable: false, sortable: false},
                
            ],
            
            dom: 'Brt',
            bSort: false,
            paginate: false
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
            setTimeout(() => {
                $('#diterima').trigger('input');
            }, 300);
        });
        
        table2 = $('.table-transaksi').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());

            if (jumlah < 1) {
                $(this).val(1);
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            }
            if (jumlah > 10000) {
                $(this).val(10000);
                alert('Jumlah tidak boleh lebih dari 10000');
                return;
            }

            $.post(`{{ url('/transaksi') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': jumlah
                })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#diterima').val()));
                    });
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $('#diterima').on('input', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }
            loadForm($(this).val());
        }).focus(function () {
            $(this).select();
        });

        $('.btn-simpan').on('click', function () {
            CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('.form-transaksi').submit();
        });
    });

    function tampilKlinik() {
        $('#modal-klinik').modal('show');
    }

    function hideKlinik() {
        $('#modal-klinik').modal('hide');
    }

    function pilihKlinik(id, nama) {
        $('#id_lab').val(id);
        $('#nama_lab').val(nama);
        hideKlinik();
        tambahKlinik();
    }

    function tambahKlinik() {
         var data = $('.form-lab').serialize();
        $.ajax({
				type : "POST",
                url: "{{ route('transaksi.store') }}",
				data: data,
				error: function() {
					alert('Tidak dapat menyimpan data');
				}
                
			}).done(response => {
                $('#nama_lab').focus();
                table.ajax.reload(() => loadForm($('#diterima').val()));
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
            });
    }
    function coba() {
        
	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'POST',
				url: "{{ route('transaksi.store') }}",
				data: data,
				success: function() {
					$('.tampildata').load("tampil.php");
				}
			});
		});
	});

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post('{{ route('transaksi.store') }}',
         $('.form-lab').serialize())
            .done(response => {
                $('#nama_lab').focus();
                table.ajax.reload();
                
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });

            var data = $('.form-lab').serialize();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			$.ajax({
				url: "{{ route('transaksi.store') }}",
				data: data,
				success: function() {
					alert('Data berhasil disimpan');
				}
			}).done(response => {
                $('#nama_lab').focus();
                table.ajax.reload();
                
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });

            $.post('{{ route('transaksi.store') }}',
         $('.form-lab').serialize())
            .done(response => {
                $('#nama_lab').focus();
                table.ajax.reload();
                
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
	
    }
    

    function tampilPasien() {
        $('#modal-pasien').modal('show');
    }

    function pilihPasien(id, nama) {
        $('#pasien_id').val(id);
        $('#nama_pasien').val(nama);
       
        // loadForm($('#diskon').val());
        //$('#diterima').val(0).focus().select();
        hidePasien();
    }

    function hidePasien() {
        $('#modal-pasien').modal('hide');
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function loadForm(diterima = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get(`{{ url('/transaksi/loadform') }}/${$('.total').text()}/${diterima}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Bayar: Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);

                $('#kembali').val('Rp.'+ response.kembalirp);
                if ($('#diterima').val() != 0) {
                    $('.tampil-bayar').text('Kembali: Rp. '+ response.kembalirp);
                    $('.tampil-terbilang').text(response.kembali_terbilang);
                }
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }
</script>
@endpush