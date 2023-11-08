<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function kondisi(){
        return $this->hasOne(Kondisi::class);
    }


    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }


    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class);
    }
}
