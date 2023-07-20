@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title fw-semibold mb-4">Form Penambahan Pegawai</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/pegawai" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="number" class="form-control" name="nip" id="nip">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection