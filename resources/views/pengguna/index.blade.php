@extends('layouts.sidebar.admin')

@section('title', 'Pengguna')
@section('content')

@section('header')
    {{ __('Pengguna') }}
@endsection
<div class="mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        Tambah Petugas
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="InputName" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" id="InputName"
                                name="name">
                        </div>
                        <div class="mb-3">
                            <label for="InputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="InputEmail1"
                                aria-describedby="emailHelp" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with
                                anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                name="password">
                        </div>
                        <div class="mb-3">
                            <label for="Select" class="form-label">Role</label>
                            <select id="Select" class="form-select" name="role">
                                <option value="admin">Administrator</option>
                                <option value="user">Petugas</option>
                            </select>

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
            <th>Nama Petugas</th>
            <th>Email</th>
            <th>Role</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @if (count($pengguna))
            @foreach ($pengguna as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form id="delete-user-{{ $user->id }}"
                            action="/pengguna/{{ $user->id }}" method="POST"
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
