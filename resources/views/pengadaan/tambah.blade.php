@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Pengadaan Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/pengadaan" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="barang_id" class="form-label">Barang</label>
                                    {{-- <input type="text" class="form-control" name="barang" id="barang"> --}}
                                    <select name="barang_id" id="barang_id" class="form-select">
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_brg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                                </div>
                                {{-- <div class="mb-3">
                <label for="tgl_kmb" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb">
            </div> --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="hidden" class="form-control" name="status" id="status"
                                        value="pengajuan">
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
