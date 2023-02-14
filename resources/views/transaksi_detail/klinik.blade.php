<div class="modal fade" id="modal-klinik" tabindex="-1" role="dialog" aria-labelledby="modal-klinik" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-klinik">Pilih Daftar Pemeriksaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-klinik">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($lab as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>Rp {{ format_uang($item->harga) }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihKlinik('{{ $item->id }}', '{{ $item->nama }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>