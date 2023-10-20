@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Form Penambahan Kategori</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/kategori/{{ $kategori->id }}" method="post">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kategori Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $kategori->nama }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
