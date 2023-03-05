@extends('layouts.sidebar.admin')

@section('title', 'Dashboard')
@section('content')

@section('header')
    Dashboard
@endsection
<div class="row mb-3">
    <h2 class="fw-bold">Ringkasan Umum</h2>
    <div class="col">
        <div class="mb-3">
            <div class="card border-0 border-start border-4 border-success rounded shadow shadow-md"
                style="width: 18rem;">
                <div class="card-body">
                    <h3><i class="bi bi-people-fill"></i> Jumlah Petugas : {{ count($petugas) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <div class="card border-0 border-start border-4 border-success rounded shadow shadow-md"
                style="width: 18rem;">
                <div class="card-body">
                    <h3><i class="bi bi-card-list"></i> Jumlah Data : {{ count($data) }} </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <div class="card border-0 border-start border-4 border-success rounded shadow shadow-md"
                style="width: 18rem;">
                <div class="card-body">
                    <h3><i class="bi bi-card-list"></i> Jumlah Entry :
                        {{ count($entry) }} </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <h2 class="fw-bold">Rincian Status Entry</h2>
        <table class="table">
            <thead>
                <th width="20px">No.</th>
                <th>Kondisi</th>
                <th>Jumlah</th>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Dimiliki :</td>
                    <td>{{ $jumlahDimiliki }}</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Rusak :</td>
                    <td>{{ $jumlahRusak }}</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Hilang :</td>
                    <td>{{ $jumlahHilang }}</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Meninggal :</td>
                    <td>{{ $jumlahMeninggal }}</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Pailit :</td>
                    <td>{{ $jumlahPailit }}</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Tidak Diketahui :</td>
                    <td>{{ $jumlahIDK }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col"></div>
    <div class="col-4">
        <h2 class="fw-bold">Petugas Paling Aktif</h2>
    </div>
</div>
@endsection
