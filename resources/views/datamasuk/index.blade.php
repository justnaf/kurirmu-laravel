@extends('layouts.sidebar.admin')

@section('title', 'Data Masuk')
@section('content')

@section('header')
    {{ __('Data Masuk') }}
@endsection
<div class="mb-3">
    <!-- Button trigger modal Tambah-->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahdata">
        Tambah Data
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
                <form action="{{ route('data.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="InputNopol" class="form-label">Nomor Polisi</label>
                            <input type="text" class="form-control" id="InputNopol"
                                name="nopol" aria-describedby="nopolHelp">
                            <div id="nopolHelp" class="form-text">Contoh : AA 34343 ES</div>
                        </div>
                        <div class="mb-3">
                            <label for="InputName" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" id="InputName"
                                name="owner">
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="Alamat" rows="3" name="alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="InputDesa" class="form-label">Desa</label>
                            <input type="text" class="form-control" id="InputDesa"
                                name="desa">
                        </div>
                        <div class="mb-3">
                            <label for="InputKec" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="InputKec"
                                name="kecamatan">
                        </div>
                        <div class="mb-3">
                            <label for="InputMod" class="form-label">Model</label>
                            <input type="text" class="form-control" id="InputMod" name="model"
                                aria-describedby="ModHelp">
                            <div id="ModHelp" class="form-text">Contoh : Rubicon Anti Pajak</div>
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
            <th>Model</th>
            <th>Alamat</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (count($data))
            @foreach ($data as $key => $datas)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $datas->nopol }}</td>
                    <td>{{ $datas->owner }}</td>
                    <td>{{ $datas->model }}</td>
                    <td>{{ $datas->alamat }}</td>
                    <td>{{ $datas->desa }}</td>
                    <td>{{ $datas->kecamatan }}</td>
                    <td>
                        <form id="delete-data-{{ $datas->id }}"
                            action="/data/{{ $datas->id }}" method="POST"
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
@endpush
@endsection
