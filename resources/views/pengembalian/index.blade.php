@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Peminjam</h5>
                            {{-- @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/pengembalian/"> Tambah</a>
                                </button>
                            @endcan --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Barang</h6>
                                        </th>

                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Jumlah Total</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No. Hp</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tgl Pinjam</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        @can('isAdmin')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Aksi</h6>
                                            </th>
                                        @endcan
                                        @can('isStaff')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Aksi</h6>
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjam as $pjm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pjm->pegawai->nama }}</td>
                                            <td><?php
                                            foreach ($pjm->barang as $brg) {
                                                echo $brg->nama_brg . ' ' . '(' . $brg->pivot->jumlah . ')' . '<br>';
                                            }
                                            ?></td>
                                            <td>{{ $pjm->total }}</td>
                                            <td>{{ $pjm->no_hp }}</td>
                                            <td>{{ $pjm->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                <button class="btn btn-danger m-1">{{ $pjm->status }}</button>
                                            </td>
                                            @can('isAdmin')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <a href="/kembalikan/{{ $pjm->id }}">
                                                        <button type="button" class="btn btn-success m-1">Kembalikan</button>
                                                    </a>
                                                    {{-- <form action="/pengembalian/{{ $pjm->id }}/edit" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-danger m-1">kembalikan</button>
                                                </form> --}}
                                                </td>
                                            @endcan
                                            @can('isStaff')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <a href="/pengembalian/edit/{{ $pjm->id }}">
                                                        <button type="button" class="btn btn-success m-1">Kembalikan</button>
                                                    </a>
                                                    {{-- <form action="/pengembalian/{{ $pjm->id }}/edit" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-danger m-1">kembalikan</button>
                                                </form> --}}
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
@endsection
