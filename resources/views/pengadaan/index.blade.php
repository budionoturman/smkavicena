@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Pengadaan Barang</h5>
                            @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/pengadaan/create"> Tambah</a>
                                </button>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                                <thead class="text-dark fs-4">
                                    <tr class="align-items-center">
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>status</th>
                                        @can('isKepSek')
                                            <th>aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengadaan as $pengadaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengadaan->barang->nama_brg }}</td>
                                            <td>{{ $pengadaan->jumlah }}</td>
                                            <td>
                                                @if ($pengadaan->status === 'pengajuan')
                                                    <button class="btn btn-warning m-1">{{ $pengadaan->status }}</button>
                                                @else
                                                    <button class="btn btn-success m-1">{{ $pengadaan->status }}</button>
                                                @endif
                                            </td>

                                            @can('isKepSek')
                                                <td>
                                                    <a href="/pengadaan/{{ $pengadaan->id }}/edit">
                                                        <button type="button" class="btn btn-outline-warning m-1"><i
                                                                class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </table>
                    </div>
                    <a href="/pdf">
                        <button type="button" class="btn btn-outline-warning m-1"><i class="fa-solid fa-eye"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
