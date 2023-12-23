@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title fw-semibold mb-4">Form Penambahan Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/barang" method="post">
                                @csrf
                                {{-- <div class="mb-3">
                  <label for="kode_brg" class="form-label">ID Barang</label>
                  <input type="text" class="form-control" id="kode_brg" name="kode_brg">
                </div> --}} <div class="form-group mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <select id="selectjurusan" name="jurusan_id" class="form-control" style="width: 100%;">
                                    </select>
                                </div>
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
                                    <input type="text" class="form-control" name="nama_brg" id="nama_brg">
                                </div>
                                <!--<div class="mb-3">
                                                    <label for="kode_brg" class="form-label">Kode Barang</label>
                                                    <input type="text" class="form-control" name="kode_brg" id="kode_brg">
                                                </div>-->
                                <div class="mb-3">
                                    <label for="jumlah_brg" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah_brg" id="jumlah_brg">
                                </div>
                                <div class="mb-3">
                                    <label for="kondisi_brg" class="form-label">Kondisi:</label>
                                    <br>
                                    <label for="jumlah_baik">Baik</label>
                                    <input type="number" class="form-control" id="jumlah_baik" name="jumlah_baik"
                                        value="">
                                    <input type="hidden" class="form-control" id="jumlah_rusak" name="jumlah_rusak"
                                        value="0">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let jumlah_brg = document.getElementById("jumlah_brg").value;
            let jumlah = jumlah_brg;

            let jumlah_baik = document.getElementById('jumlah_baik').value = jumlah;
        </script>
    @endsection
