<div class="modal fade" id="modal-pasien" tabindex="-1" role="dialog" aria-labelledby="modal-pasien">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-pasien">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $item)
                            <tr>
                                <td width="5%">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs btn-flat"
                                        onclick="pilihPasien('{{ $item->id }}', '{{ $item->nama_pasien }}')">
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