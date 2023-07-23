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
                                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo (isset($data->id)?$data->id:""); ?>" readonly>
                            <div class="mb-3">
                                <label for="tgl_pjm" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tgl_pjm" id="tgl_pjm" value="<?php echo (isset($data->tgl_pjm)?$data->tgl_pjm:""); ?>" readonly>
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
