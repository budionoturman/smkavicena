@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Data Barang</h5>
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
                                </thead>
                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $brg->kategori->nama }}</td>
                                            <td>{{ $brg->nama_brg }}</td>
                                            <td class="text-center">{{ $brg->jumlah_brg }}</td>
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
