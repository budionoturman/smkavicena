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
                                {{-- id peminjam --}}
                                <input type="hidden" name="peminjam_id" value="{{ $data->id }}">
                                <div class="form-group mb-3">
                                    @foreach ($data->barang as $data)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="nama_brg" class="form-label">Nama Barang</label>
                                                    </div>
                                                    <div class="col">
                                                        <label for="jumlah" class="form-label">jumlah Barang
                                                            Dipinjam</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <input type="text" class="form-control" name="nama_brg[]"
                                                            id="nama_brg[]" value="{{ $data->nama_brg }}" readonly>
                                                        <input type="hidden" class="form-control" name="barang_id[]"
                                                            id="barang_id[]" value="{{ $data->id }}" readonly>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <input type="text" class="form-control" name=""
                                                            id="" value="{{ $data->pivot->jumlah }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    Kondisi
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Baik</label>
                                                    <input type="" class="form-control" name="jumlah_baik[]"
                                                        id="jumlah_baik[]" value="">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Rusak</label>
                                                    <input type="" class="form-control" name="jumlah_rusak[]"
                                                        id="jumlah_rusak[]">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <input type="hidden" class="form-control" name="id" id="id"
                                    value="<?php echo isset($data->id) ? $data->id : ''; ?>" readonly>
                                <div class="mb-3">
                                    <label for="tgl_pjm" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pjm" id="tgl_pjm"
<<<<<<< HEAD
                                        value="<?php echo isset($data->tgl_pjm) ? $data->tgl_pjm : ''; ?>" readonly>
=======
                                        value="{{ $tgl_pjm }}" readonly>
>>>>>>> 3ae5a1ef3439c45b4f5a20bf75cdca876d479cc6
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
