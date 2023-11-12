@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="row-lg-12 d-flex align-items-stretch">
                <div class="mx-4">
                    <div class="card" style="width: 18rem; mx-10;">
                        <img src="https://www.quipper.com/id/blog/wp-content/uploads/2022/09/Teknik-Komputer-Jaringan.webp"
                            class="img-thumbnail alt="..." style="widows: 100px; height:250px">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Barang</h5>
                            <p class="card-text">
                                Teknik Komputer Jaringan : <br>
                                {{ $jumlahTkj }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-4">
                    <div class="card" style="width: 18rem; mx-10;">
                        <img src="https://i.pinimg.com/736x/47/55/2c/47552cff6c11d9fb901a904c48b823ee.jpg"
                            class="img-thumbnail
                            alt="..." style="widows: 100px; height:250px">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Barang</h5>
                            <p class="card-text">
                                Teknik Otomotif : <br>
                                {{ $jumlahTo }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-4">
                    <div class="card" style="width: 18rem; mx-10;">
                        <img src="https://img.freepik.com/premium-vector/minimal-multimedia-logo-template_416562-755.jpg?w=740"
                            class="img-thumbnail
                            alt="..." style="widows: 100px; height:250px">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Barang</h5>
                            <p class="card-text">
                                Multimedia : <br>
                                {{ $jumlahMm }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Data Barang Inventaris</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori</th>
                                        <th>Kode</th>
                                        <th>Nama Barag</th>

                                        <th>Jumlah</th>
                                        <th>baik</th>
                                        <th>rusak </th>
                                        =======
                                        <th>Stok</th>
                                        <th>Kondisi baik</th>
                                        <th>Kondisi rusak </th>
                                        >>>>>>> 3ae5a1ef3439c45b4f5a20bf75cdca876d479cc6
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $brg->kategori->nama ?? 'None' }}</td>
                                            <td>{{ $brg->kode_brg }}</td>
                                            <td>{{ $brg->nama_brg }}</td>
                                            <td>{{ $brg->jumlah_brg }}</td>
                                            <td>{{ $brg->jumlah_baik }}</td>
                                            <td>{{ $brg->jumlah_rusak }}</td>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Data Peminjam Barang Inventaris</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" border="2" id="dataTable">
                                <thead>
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
                                            {{-- <td>{{ $pjm->jumlah }}</td> --}}
                                            <td>{{ $pjm->no_hp }}</td>
                                            <td>{{ $pjm->tgl_pjm }}</td>
                                            <td>{{ $pjm->tgl_kmb }}</td>
                                            <td>
                                                @if ($pjm->status === 'belum kembali')
                                                    <button class="btn btn-danger m-1">{{ $pjm->status }}</button>
                                                @else
                                                    <button class="btn btn-success m-1">{{ $pjm->status }}</button>
                                                @endif
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
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                href="https://themewagon.com">ThemeWagon</a></p>
    </div>
    </div>
@endsection
