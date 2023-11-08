<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Http\Requests\StorePengadaanRequest;
use App\Http\Requests\UpdatePengadaanRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::has('barang')->get();
        return view('pengadaan/index',[
            'pengadaan' => $pengadaan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengadaan/tambah',[
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);

        Pengadaan::create($validatedData);
        return redirect('pengadaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        return view('pengadaan/edit', [
            'pengadaan' => $pengadaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required'
        ]);

        Pengadaan::where('id', $pengadaan->id)->update($validatedData);
        return redirect('pengadaan')->with('success', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengadaan $pengadaan)
    {
        //
    }

    public function pdf()
    {
        //nomor surat       
        $tahun = Carbon::now('Y');
        $AWAL = 'PGB';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Pengadaan::max('id');
        $no = "0".$noUrutAkhir + 1;
        $no_surat = $no . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . $tahun->year;

        //data barang yang sudah disetujui
        $data =  Pengadaan::has('barang')->where('status', 'disetujui')->get();
        
        return view('pdf/pdf',[
            'no_surat' => $no_surat,   //nomor surat
            'data' => $data,  //isi surat
        ]);
    }

    public function cetakPdf()
    {
         //nomor surat       
         $tahun = Carbon::now('Y');
         $AWAL = 'PGB';
         $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
         $noUrutAkhir = Pengadaan::max('id');
         $no = "0".$noUrutAkhir + 1;
         $no_surat = $no . '/' . $AWAL . '/' . $bulanRomawi[date('n')] . '/' . $tahun->year;
 
         //data barang yang sudah disetujui
        $data =  Pengadaan::has('barang')->where('status', 'disetujui')->get();

        $pdf = PDF::loadView('pdf/cetak', [
            'no_surat' => $no_surat,   //nomor surat
            'data' => $data,  //isi surat
        ]);
        return $pdf->stream('pengadaan.pdf');
    }
}
