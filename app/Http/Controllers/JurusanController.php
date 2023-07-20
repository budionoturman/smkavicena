<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use App\Models\Jurusan;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }

    public function getjurusan (Request $request)
    {
        $jurusan = [];
     //   console.log("jim");
        if($request->has('q')){
            $search = $request->q;
            $jurusan =Jurusan::select("id", "nama")
                    ->where('nama', 'LIKE', "%$search%")
                    ->get();
        }else{ 
            $jurusan =Jurusan::select("id", "nama")->orderBy('id')->get();
        }
        return response()->json($jurusan);
    }
}
