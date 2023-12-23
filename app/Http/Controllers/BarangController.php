<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail_barang;
use App\Models\Kategori;
use App\Models\Jurusan;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Kondisi;
use Illuminate\Http\Request;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang/index',[
            'barang' => Barang::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang/tambah',[
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(Request $request)
    {
        // $id = match($request->kategori_id)
        // {
        //      '1' => IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 7, 'prefix' => 'TKJ-']),
        //      '2' => IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 7, 'prefix' => 'TOO-']),
        //      '3' => IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 7, 'prefix' => 'MMM-']),
        // };
        
        // if($request->kategori_id == 1)
        // {
        //     $id = IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 6, 'prefix' => 'TKJ-']);
        // }
        // elseif($request->kategori_id == 2)
        // {
        //     $id = IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 6, 'prefix' => 'TO-']);
        // }
        // else($request->kategori_id == 3)
        // {
        //     $id = IdGenerator::generate(['table' => 'barangs', 'field' => 'kode_brg', 'length' => 6, 'prefix' => 'MM-']);
        // }

        $kdjur =Jurusan::where('id', '=', "$request->jurusan_id")->get();
        $kategor =Kategori::where('id', '=', "$request->kategori_id")->get();
    
        $kodejur = $kdjur[0]->kode_jurusan;
        $kategoriname = $kategor[0]->nama;
        $kodebrg = $kodejur.$kategoriname;
        $barangs = Barang::where('kode_brg', 'like', "%$kodejur%")->get();
        $num = count($barangs);

        $kodebrgfix = $kodejur."-".$num+1;
        //dd($kodebrgfix);
        //$request->kode_brg= $kodebrgfix;

        /*$validatedata1 = $request->validate([
            'jurusan_id' => 'required',
            'kategori_id' => 'required',
            'nama_brg' => 'required',
            'kode_brg' => $kodebrgfix ,
            'jumlah_brg' => 'required'
        ]);*/
        //dd('test');
        // $validatedata1['kode_brg'] = $id;
        
        // $validatedata2= $request->validate([
        //     'baik'=> 'required',
        //     'rusak'=> 'required'
        // ]);
        Barang::create([
            'kode_brg' => $kodebrgfix ,
            'kategori_id' => $request->kategori_id,
            'jurusan_id' => $request->jurusan_id,
            'nama_brg' => $request->nama_brg,
            'jumlah_brg' =>  $request->jumlah_brg,
            'jumlah_baik' => $request->jumlah_baik,
            'jumlah_rusak' => $request->jumlah_rusak
        ]);

       
        // $barang = Barang::create($validatedata1);
        // $kondisi= new Kondisi($validatedata2);
        // $barang->save();
        // $barang->kondisi()->save($kondisi);
        return redirect('/barang')->with("success", "Tambah Barang Berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('/barang/edit',[
            'kategori'=>Kategori::all(),
            'barang'=>$barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validatedData1=$request->validate([
            'kategori_id'=>'required',
            'nama_brg'=>'required',
            'jumlah_brg'=>'required',            
            'jumlah_baik'=>'required',            
            'jumlah_rusak'=>'required',            
        ]); 

        // $validatedData2=$request->validate([
        //     'baik' => 'required',
        //     'rusak' => 'required'
        // ]);
        // $validatedData2['barang_id']=$barang->id;

        Barang::where('id', $barang->id)->update($validatedData1);
        // Kondisi::where('barang_id', $barang->id)->update($validatedData2);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/barang');
    }
    public function stok(){
        return view('stok/index',[
            'barang' => Barang::orderBy('jumlah_brg','asc')->get()
        ]);
    }

    
    public function getbarang (Request $request)
    {
        $barang = [];
     //   console.log("jim");
        if($request->has('q')){
            $search = $request->q;
            $barang =Barang::select("id", "kode_brg")
                    ->where('kode_brg', 'LIKE', "%$search%")
                    ->get();
        }else{ 
            $barang =Barang::select("id", "kode_brg", "nama_brg")->orderBy('id')->get();
        }
        return response()->json($barang);
    }
}