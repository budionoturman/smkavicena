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
                    <h5 class="card-title fw-semibold mb-4">Form Peminjaman Barang</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="/peminjam" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Peminjam</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Barang</label>
                                    <select id="barang" name="barang_id" class="form-control selectbarang" style="width: 100%;">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Barang</label>
                                    <select id="barang1" name="barang_id1" class="form-control selectbarang" style="width: 100%;">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah1" id="jumlah">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Barang</label>
                                    <select id="barang2" name="barang_id2" class="form-control selectbarang" style="width: 100%;">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah2" id="jumlah">
                                </div>
                               <!-- <div class="mb-3">
                                    <label for="barang_id" class="form-label">Barang</label>
                                    <input type="text" name="search" id="search" class="form-control form-control-lg"
                                        placeholder="Type Here..." />
                                    {{-- <input type="text" class="form-control" name="barang" id="barang"> --}}
                                    {{-- <select name="barang_id" id="barang_id" class="form-select">
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_brg }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>-->
                              
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. Hp</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_pjm" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pjm" id="tgl_pjm">
                                </div>
                                {{-- <div class="mb-3">
                    <label for="tgl_kmb" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tgl_kmb" id="tgl_kmb">
                </div> --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="hidden" class="form-control" name="status" id="status"
                                        value="belum kembali">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#tgl_pjm').attr('min', minDate);
        });


        var path = "{{ url('peminjam/create/') }}";

        $('#search').typeahead({

            source: function(query, process) {

                return $.get(path, {
                    query: query
                }, function(data) {

                    return process(data);
                });
            }
        });
    </script>
@endsection
