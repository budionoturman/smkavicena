@extends('layout/layout')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex inline justify-content-between">
                            <h5 class="card-title fw-semibold mb-4">Tabel Kategori Barang</h5>
                            @can('isAdmin')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/kategori/create"> Tambah</a>
                                </button>
                            @endcan
                            @can('isStaff')
                                <button type="button" class="btn btn-outline-secondary m-1">
                                    <a href="/kategori/create"> Tambah</a>
                                </button>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $kategori)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $kategori->nama }}
                                            </td>
                                            <td class="d-flex inline">
                                                <a href="/kategori/{{ $kategori->id }}/edit">
                                                    <button type="button" class="btn btn-outline-warning m-1"><i
                                                            class="fa-solid fa-pen-to-square"></i></button>
                                                </a>
                                                <form action="/kategori/{{ $kategori->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger m-1"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
