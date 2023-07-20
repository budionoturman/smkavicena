@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Data Barang</h5>
                            @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/barang/create"> Tambah</a>
                                </button>
                            @endcan
                            @can('isStaff')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/barang/create"> Tambah</a>
                                </button>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr class="align-items-center">
                                        <th class="border-bottom-0" rowspan="2" style="vertical-align: middle">
                                            <h6 class="fw-semibold mb-0">No.</h6>
                                        </th>
                                        <th class="border-bottom-0" rowspan="2" style="vertical-align: middle">
                                            <h6 class="fw-semibold mb-0">Kategori</h6>
                                        </th>
                                        <th class="border-bottom-0" rowspan="2" style="vertical-align: middle">
                                            <h6 class="fw-semibold mb-0">Nama Barang</h6>
                                        </th>
                                        <th class="border-bottom-0" rowspan="2" style="vertical-align: middle">
                                            <h6 class="fw-semibold mb-0">Jumlah</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center" colspan="2"
                                            style="vertical-align: middle">
                                            <h6 class="fw-semibold mb-0">Kondisi</h6>
                                        </th>
                                    </tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Baik</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Rusak</h6>
                                    </th>
                                    @can('isAdmin')
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Aksi</h6>
                                        </th>
                                    @endcan
                                    @can('isStaff')
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Aksi</h6>
                                        </th>
                                    @endcan
                                </thead>
                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td>{{ $brg->id }}</td>
                                            <td>{{ $brg->kategori->nama }}</td>
                                            <td>{{ $brg->nama_brg }}</td>
                                            <td class="text-center">{{ $brg->jumlah_brg }}</td>
                                            <td class="text-center">{{ $brg->kondisi->baik }}</td>
                                            <td class="text-center">{{ $brg->kondisi->rusak }}</td>
                                            @can('isAdmin')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <a href="/barang/{{ $brg->id }}/edit">
                                                        <button type="button" class="btn btn-outline-warning m-1"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>
                                                    <form action="/barang/{{ $brg->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger m-1"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
                                            @can('isStaff')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <a href="/barang/{{ $brg->id }}/edit">
                                                        <button type="button" class="btn btn-outline-warning m-1"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>
                                                    <form action="/barang/{{ $brg->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger m-1"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
