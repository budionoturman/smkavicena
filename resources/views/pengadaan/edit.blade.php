@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Pengadaan Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/pengadaan/{{ $pengadaan->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="barang_id" class="form-label">Barang</label>
                                    <input type="text" class="form-control" name="barang_id" id="barang_id"
                                        placeholder="{{ $pengadaan->barang->nama_brg }}">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="barang_id" id="barang_id"
                                        value="{{ $pengadaan->barang->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah"
                                        value="{{ $pengadaan->jumlah }}">
                                </div>
                                {{-- <div class="mb-3">
                <label for="tgl_kmb" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb">
            </div> --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="hidden" class="form-control" name="status" id="status"
                                        value="disetujui">
                                </div>
                                <button type="submit" class="btn btn-primary">Setujui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
