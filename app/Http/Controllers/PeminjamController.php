<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use App\Models\Detail_barang;
use App\Models\Kategori;
use App\Models\Kondisi;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        return view('peminjam/index',[
            'peminjam' => Peminjam::where('status', '=', 'proses')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjam/tambah',[
            'barang' => Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //dd(array_sum($request->jumlah));


        $data = Barang::where('id', $request->barang_id)->value('jumlah_brg');

       // $dipinjam = $request->jumlah;
        
        //$barangSisa = $data-$dipinjam;
       $barangSisa = 10;

        //$request->total = array_sum($request->jumlah);
       
      //  $request->tgl_pjm = Carbon::now()->format('Y-m-d');

       
        //dd($request->total);

        /*$validatedData = $request->validate([
            'pegawai_id' => 'required',
            'no_hp'  => 'required',
            'tgl_pjm'  => 'required',
            'status' => 'required',
           
           // 'total' => array_sum($request->jumlah)
            //'total' => 'required'
        ]);*/

        //dd($request);

        if ($barangSisa < 0) {
            return redirect('/peminjam/create')->with('success', 'Jumlah Barang Melebihi Stok, Tidak Bisa Pinjam');
        } else {
            # code...
           /* Barang::where('id', $request->barang_id)->update(['jumlah_brg' => $barangSisa]);
            Kondisi::where('id', $request->barang_id)->update(['baik' => $barangSisa]);*/
           /* $peminjam = Peminjam::create($validatedData);*/
            $peminjam = Peminjam::create([
                
                'pegawai_id' => $request->pegawai_id,
                'no_hp'  => $request->no_hp,
                'tgl_pjm'  => Carbon::now()->format('Y-m-d'),
                'status' => $request->status,
                'total' => array_sum($request->jumlah)
                //'total' => 'required'
            ]);
            for($i = 0;$i<=count($request->barang_id)-1;$i++)
            {
                $brg = Barang::find($request->barang_id[$i])->get();
                $jmlh = $brg[0]->jumlah_brg-$request->jumlah[$i];
              

                DB::table('barangs')->where('id', $request->barang_id[$i])->update(['jumlah_brg' => $jmlh]);
                //$post->save()

                Detail_barang::create([ 
                    'peminjam_id' => $peminjam->id,
                    'barang_id' => $request->barang_id[$i],
                    'jumlah' => $request->jumlah[$i]

                ]);
             }

            /*foreach ($request->barang_id as $key => $value) {
                Detail_barang::create([ 
                    'peminjam_id' => $peminjam->id,
                    'barang_id' => $value,
                    'jumlah' => $request->jumlah[$loop->iteration ],
                ]);
            }*/
    

            /*Detail_barang::create([ 
              
                'peminjam_id' => $peminjam->id,
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
            ]);
            Detail_barang::create([ 
            
                'peminjam_id' => $peminjam->id,
                'barang_id' => $request->barang_id1,
                'jumlah' => $request->jumlah1,
            ]);
            Detail_barang::create([ 
               
                'peminjam_id' => $peminjam->id,
                'barang_id' => $request->barang_id2,
                'jumlah' => $request->jumlah2,
            ]);*/

            return redirect('/peminjam');
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjam $peminjam)
    {
        return view('/peminjam/edit',[
            'peminjam'=>$peminjam
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        $validatedData=$request->validate([
            'nama' => 'required',
            'barang' => 'required',
            'jumlah'  => 'required',
            'no_hp'  => 'required',
            'tgl_pjm'  => 'required',
            'status' => 'required'
        ]); 
        Peminjam::where('id', $peminjam->id)->update($validatedData);
        return redirect('/peminjam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjam $peminjam)
    {
        //
        Peminjam::destroy($peminjam->id);
        return redirect('/peminjam');
    }

    public function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Barang::select('nama_brg')
                        ->where('nama_brg', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }

    public function proses(Request $request){
        //$transaksidata = Transaksi::query()->get()->find($id);
        $peminjam = Peminjam::findOrFail($request->id);


        $peminjam->status = "belum kembali";
        
        $peminjam->save();


        return redirect('/peminjam');
   }



}
