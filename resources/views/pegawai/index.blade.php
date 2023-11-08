@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Data pegawaic</h5>
                            @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/pegawai/create"> Tambah</a>
                                </button>
                            @endcan
                            @can('isStaff')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/pegawai/create"> Tambah</a>
                                </button>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" border="2" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Pegawai</th>
                                        <th>NIP</th>
                                        <th>No. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pgw)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pgw->nama }}</td>
                                            <td>{{ $pgw->nip }}</td>
                                            <td>{{ $pgw->no_hp }}</td>
                                            <td class="d-flex inline">
                                                <a href="/pegawai/{{ $pgw->id }}/edit">
                                                    <button type="button" class="btn btn-outline-warning m-1"><i
                                                            class="fa-solid fa-pen-to-square"></i></button>
                                                </a>
                                                <form action="/pegawai/{{ $pgw->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger m-1"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
