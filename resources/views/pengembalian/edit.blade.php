@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Pengembalian Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            @foreach ($peminjam as $peminjam)
                                <form action="{{ route('pengembalianbarang') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id" id="id"
                                            value="{{ $peminjam->id }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Peminjam</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            value="{{ $peminjam->nama }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="barang_id" class="form-label">Barang</label>
                                        <input type="text" class="form-control" name="barang_id" id="barang_id"
                                            value="{{ $peminjam->barang->id }}">
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
                                    <div class="mb-3">
                                        <label for="tgl_kmb" class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb"
                                            min="{{ $peminjam->tgl_pjm }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="hidden" class="form-control" name="status" id="status"
                                            value="Sudah Kembali">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
