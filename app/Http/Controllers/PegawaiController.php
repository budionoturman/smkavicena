<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai/index', [
            'pegawai' =>Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai/tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required'
        ]);
        Pegawai::create($validatedData);
        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai/edit', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required'
        ]);
        Pegawai::where('id', $pegawai->id)->update($validatedData);
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {

        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai');
    }

    
    public function getpegawai (Request $request)
    {
        $pegawai = [];
     //   console.log("jim");
        if($request->has('q')){
            $search = $request->q;
            $pegawai =Pegawai::select("id", "nama")
                    ->where('nama', 'LIKE', "%$search%")
                    ->get();
        }else{ 
            $pegawai =pegawai::select("id", "nama")->orderBy('id')->get();
        }
        return response()->json($pegawai);
    }
}