<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Peminjam;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $idTkj = Jurusan::where('nama','LIKE', '\\'. 'Teknik Komputer & Jaringan'. '%')->value('id');
        $idTo = Jurusan::where('nama','LIKE', '\\'. 'Teknik Otomotif'. '%')->value('id');
        $idMm = Jurusan::where('nama','LIKE', '\\'. 'Multimedia'. '%')->value('id');
        
        $jumlahTkj = Barang::where('jurusan_id', $idTkj)->sum('jumlah_brg');
        $jumlahTo = Barang::where('jurusan_id', $idTo)->sum('jumlah_brg');
        $jumlahMm = Barang::where('jurusan_id', $idMm)->sum('jumlah_brg');

        return view('index',[
            'barang' => Barang::all(),
            'peminjam' => Peminjam::all(),
            'jumlahTkj' => $jumlahTkj,
            'jumlahTo' => $jumlahTo,
            'jumlahMm' => $jumlahMm,
        ]);
    }
}