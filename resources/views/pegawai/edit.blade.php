@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Edit Penambahan Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/pegawai/{{ $pegawai->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $pegawai->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" class="form-control" name="nip" id="nip"
                                        value="{{ $pegawai->nip }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. Hp</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        value="{{ $pegawai->no_hp }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection