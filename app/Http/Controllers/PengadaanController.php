<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Http\Requests\StorePengadaanRequest;
use App\Http\Requests\UpdatePengadaanRequest;
use App\Models\Barang;
use Illuminate\Http\Request;

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

    public function pdf($id)
    {
        return view('pdf/pdf');
    }
}
