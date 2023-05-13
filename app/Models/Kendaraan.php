<?php

namespace App\Models;

use App\Models\Penyewaan;
use App\Models\RiwayatKendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";

    public function riwayatKendaraan(){
        return $this->hasMany(RiwayatKendaraan::class,'kendaraan_id','id');
        
    }

    public function penyewaan(){
        return $this->hasMany(Penyewaan::class,'kendaraan_id','id');
    }

}
