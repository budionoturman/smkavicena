@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Peminjam</h5>
                            @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/peminjam/create"> Tambah</a>
                                </button>
                            @endcan
                            @can('isStaff')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/peminjam/create"> Tambah</a>
                                </button>
                            @endcan
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
                                            <h6 class="fw-semibold mb-0">Jumlah</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No. Hp</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tgl Pinjam</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tgl Kembali</h6>
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
                                                echo $brg->kode_brg;
                                            }
                                            ?></td>
                                            <td><?php
                                            foreach ($pjm->barang as $brg) {
                                                echo '' . $brg->pivot->jumlah . '';
                                            }
                                            ?></td>
                                            <td>{{ $pjm->no_hp }}</td>
                                            <td>{{ $pjm->tgl_pjm }}</td>
                                            <td>{{ $pjm->tgl_kmb }}</td>
                                            <td>
                                                @if ($pjm->status === 'belum kembali')
                                                    <button class="btn btn-danger m-1">{{ $pjm->status }}</button>
                                                @elseif($pjm->status === 'proses')
                                                    <a href="/proses/{{ $pjm->id }}">
                                                        <button type="button"
                                                            class="btn btn-success m-1">{{ $pjm->status }}</button>
                                                    </a>
                                                @else
                                                    <button class="btn btn-success m-1">{{ $pjm->status }}</button>
                                                @endif
                                            </td>
                                            @can('isAdmin')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <!-- <a href="/peminjam/{{ $pjm->id }}/edit">
                                                                                                        <button type="button" class="btn btn-warning m-1"><i
                                                                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                                                                    </a>-->
                                                    <form action="/peminjam/{{ $pjm->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
                                            @can('isStaff')
                                                <td class="text-center d-flex inline justify-content-center">
                                                    <!--<a href="/peminjam/{{ $pjm->id }}/edit">
                                                                                                        <button type="button" class="btn btn-warning m-1"><i
                                                                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                                                                    </a>-->
                                                    <form action="/peminjam/{{ $pjm->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
                                    @endforeach
                                    </tr>
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
