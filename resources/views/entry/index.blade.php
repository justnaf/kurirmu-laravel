@extends('layouts.sidebar.admin')

@section('title', 'Data Masuk')
@section('content')

@section('header')
    {{ __('Data Masuk') }}
@endsection
<div class="mb-3">
    <!-- Button trigger modal Tambah-->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahdata">
        Entry Data
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('entry.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="InputNopol" class="form-label">Nomor Polisi</label>
                            <select class="form-select js-states js-example-basic-single"
                                style="width: 100%" name="data_id">
                                @foreach ($nopol as $datpol)
                                    <option value="{{ $datpol->id }}">{{ $datpol->nopol }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="nopolHelp" class="form-text">Pilih Nomor Polisi Yang Tertera
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="InputNop" class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" id="InputNop"
                                name="no_telp">
                        </div>
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example"
                                id="Status" name="status">
                                <option value="Dimiliki">Dimiliki</option>
                                <option value="Dijual">Dijual</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Hilang">Hilang</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Pailit">Pailit</option>
                                <option value="Tidak Diketahui">Tidak Diketahui</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="InputNotes" class="form-label">Catatan</label>
                            <textarea class="form-control" id="InputNotes" rows="3" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.flash')
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th width="10px">No.</th>
            <th>Nomor Polisi</th>
            <th>Nama Pemilik</th>
            <th>No. Telpon</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (count($entry))
            @foreach ($entry as $key => $datas)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $datas->data->nopol }}</td>
                    <td>{{ $datas->data->owner }}</td>
                    <td>{{ $datas->no_telp }}</td>
                    <td>{{ $datas->status }}</td>
                    <td>{{ $datas->notes }}</td>
                    <td>
                        <form id="delete-entry-{{ $datas->id }}"
                            action="/admin/entry{{ $datas->id }}" method="POST"
                            style="display: inline;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" data-toggle="tooltip"
                                data-placement="top" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true,
                lengthChange: false,
                buttons: [{
                    extend: 'excel',
                    split: ['pdf'],
                }]
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>

    <script defer>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Pilih Plat Nomor',
                dropdownParent: '#tambahdata'
            });
        });
    </script>
@endpush
@endsection
