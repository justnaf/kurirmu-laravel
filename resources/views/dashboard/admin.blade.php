@extends('layouts.sidebar.admin')

@section('title', 'Dashboard')
@section('content')

@section('header')
    Dashboard
@endsection
<div class="row">
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
@endsection
