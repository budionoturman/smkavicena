<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index',[
            'barang' => Barang::all(),
            'peminjam' => Peminjam::all(),
        ]);
    }
}