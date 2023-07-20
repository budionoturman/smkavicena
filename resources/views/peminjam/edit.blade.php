@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Edit Peminjaman Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/peminjam/{{ $peminjam->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Peminjam</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $peminjam->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="barang" class="form-label">Barang</label>
                                    <input type="text" class="form-control" name="barang" id="barang"
                                        value="{{ $peminjam->barang->nama_brg }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah"
                                        value="{{ $peminjam->jumlah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. Hp</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        value="{{ $peminjam->no_hp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_pjm" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pjm" id="tgl_pjm"
                                        value="{{ $peminjam->tgl_pjm }}">
                                </div>
                                {{-- <div class="mb-3">
                    <label for="tgl_kmb" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb">
                </div> --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="hidden" class="form-control" name="status" id="status"
                                        value="Belum Kembali">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
