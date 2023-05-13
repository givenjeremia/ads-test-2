<?php

namespace App\Models;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatKendaraan extends Model
{
    use HasFactory;
    protected $table = "riwayat_kendaraan";

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }

}
