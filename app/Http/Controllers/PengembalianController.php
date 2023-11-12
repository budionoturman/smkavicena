<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function pengembalian()
    {
        return view('pengembalian/index',[
            'peminjam' => Peminjam::where('status', 'like', 'belum kembali')->get(),
        ]);
    }
    public function detail($id){

        // dd($request->id);
 
         if($id)
         {
             
          $data = Peminjam::with(['barang','pegawai'])->get()->find($id);
          
          //var_dump($transaksidata);
          //exit();
         
            
         } 

         return view('peminjam.detail',['data' =>$data]);
     }



    public function history()
    {
        return view('pengembalian/history',[
            'peminjam' => Peminjam::where('status', 'like', 'sudah kembali')->get(),
        ]);
    }

    public function edit($id)
    {
        return view('pengembalian/edit',[
            'peminjam' => Peminjam::where('id', $id)->get(),
        ]);
    }

    public function update(Request $request)
    {

        $data = Barang::where('id', $request->barang_id)->value('jumlah_brg');

        $dipinjam = $request->jumlah;
        
        $barangSisa = $data+$dipinjam;

        $validatedData=$request->validate([
            'nama' => 'required',
            'barang_id' => 'required',
            'jumlah'  => 'required',
            'no_hp'  => 'required',
            'tgl_pjm'  => 'required',
            'tgl_kmb'  => 'required',
            'status' => 'required'
        ]); 

        Peminjam::where('id', $request->id)->update($validatedData);
        Barang::where('id', $request->barang_id)->update(['jumlah_brg' => $barangSisa]);
        return redirect('/pengembalian')->with('success', 'Barang berhasil dikembalikan');
    }

    public function storekembali(Request $request){
         //$transaksidata = Transaksi::query()->get()->find($id);
         
          //update stok
         for($i = 0;$i<=count($request->barang_id)-1;$i++)
            {
                $brg = Barang::find($request->barang_id[$i])->get();
                $jumlah_baik = $brg[$i]->jumlah_baik+$request->jumlah_baik[$i];
                $jumlah_rusak = $brg[$i]->jumlah_rusak+$request->jumlah_rusak[$i];
              

                DB::table('barangs')->where('id', $request->barang_id[$i])->update(['jumlah_baik' => $jumlah_baik]);
                DB::table('barangs')->where('id', $request->barang_id[$i])->update(['jumlah_rusak' => $jumlah_rusak]);
             }
        

         $peminjam = Peminjam::findOrFail($request->peminjam_id);

         $peminjam->tgl_kmb = $request->tgl_kmb;
         $peminjam->denda = $request->denda;
         $peminjam->status = "sudah kembali";
         
         $peminjam->save();

        
 

         return redirect('/pengembalian');
    }

    public function kembalikan($id){

        // dd($request->id);
 
         if($id)
         {
             
          $peminjam = Peminjam::with(['barang','pegawai'])->get()->find($id);
          //var_dump($peminjam);
          //exit();
          
          //var_dump($transaksidata);
          //exit();
         
            
         } 


         //var_dump(['data' => $peminjam->tgl_pjm]);
         //exit();
         $tgl_pjm = $peminjam->tgl_pjm;
         return view('pengembalian.kembalikan',[
            'data' => $peminjam,
            'tgl_pjm' => $tgl_pjm
        ]);
     }
}
