@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Pengembalian Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/storekembali" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama_brg" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_brg" id="nama_brg">
                                </div>
                                <div class="form-group mb-3">
                                    Kondisi
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Baik</label>
                                    <input type="" class="form-control" name="" id="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Rusak</label>
                                    <input type="" class="form-control" name="" id="">
                                </div>

                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo isset($data->id) ? $data->id : ''; ?>" readonly>
                                <div class="mb-3">
                                    <label for="tgl_pjm" class="form-label">Tanggal Pinjam</label>

                                    <input type="date" class="form-control" name="tgl_pjm" id="tgl_pjm"
<<<<<<< HEAD
                                        value="{{ $tgl_pjm }}" readonly>

=======
                                        value="<?php echo isset($data->tgl_pjm) ? $data->tgl_pjm : ''; ?>" readonly>
>>>>>>> 02234d5aa0b9e52dcda1757903da2a1468126062
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_pjm" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Denda</label>
                                    <input type="number" class="form-control" name="denda" id="denda">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
