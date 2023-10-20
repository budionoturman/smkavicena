@extends('layout/layout')
<style>
    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
</style>
@section('container')
    <div class="container-fluid">
        <div class="row">
            <section class="sheet padding-10mm">
                {{-- <h3>Surat Keretangan </h3> --}}
                <p>No :</p>
                <p>Perihal :</p>
                <p>Tanggal :</p>
                <br>
                <br>
                <br>
                <p>Dengan hormat,<br>
                    Yang bertanda tangan dibawah ini, Kepala SMK Avicena Rajeg: <br>
                    Nama :Muhammad Subur, S.Pd.,MM <br>
                    NIP : <br>
                    Jabatan : Kepala SMK Avicena Rajeg</p>

                <p>Bermaksud untuk mengajukan permohonan pengadaan barang dengan rincian sebagai berikut:</p>
                <table class="table" border="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" width="1">1</td>
                            <td>Monitor</td>
                            <td>3</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                <p>Demikian kami sampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
                <br>
                <br>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Mengetahui,<br>
                                Kepala SMK Avicena Rajeg <br>
                                <br>
                                <br>
                                <br>
                                <p>Muhammad Subur, S.Pd.,MM</p>
                            </th>
                            <th>Kaprog. TI<br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p>Suhendra, S.Kom</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    </div>
@endsection
