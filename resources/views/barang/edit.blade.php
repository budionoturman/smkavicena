@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Edit Penambahan Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/barang/{{ $barang->id }}" method="post">
                                @csrf
                                @method('put')
                                {{-- <div class="mb-3">
                  <label for="kode_brg" class="form-label">ID Barang</label>
                  <input type="text" class="form-control" id="kode_brg" name="kode_brg" value="{{ $barang->kode_brg }}">
                </div> --}}
                                <div class="mb-3">
                                    <label for="kategori_id" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori_id" aria-label="Default select example">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_brg" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_brg" id="nama_brg"
                                        value="{{ $barang->nama_brg }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_brg" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah_brg" id="jumlah_brg"
                                        value="{{ $barang->jumlah_brg }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kondisi:</label>
                                    <br>
                                    <label for="jumlah_baik">Baik</label>
                                    <input type="text" class="form-control" id="jumlah_baik" name="jumlah_baik"
                                        value=" {{ $barang->jumlah_baik }}">
                                    <br>
                                    <label for="jumlah_rusak">Rusak</label>
                                    <input type="text" class="form-control" id="jumlah_rusak" name="jumlah_rusak"
                                        value="{{ $barang->jumlah_rusak }} ">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
