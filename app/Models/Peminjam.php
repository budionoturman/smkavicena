<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $guarded=['id'];

   /* public function barang()
    {
        return $this->belongsTo(Barang::class);
    }*/
    public function barang()
    {
        return $this->belongsToMany(Barang::class,'detail_barangs')->withPivot('jumlah');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
