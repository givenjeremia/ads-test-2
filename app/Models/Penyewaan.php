<?php

namespace App\Models;

use App\Models\User;
use App\Models\Driver;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = "penyewaan";

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id');
    }

    public function persetujuan(){
        return $this->belongsToMany(User::class,'persetujuan','penyewaan_id','user_id')->withPivot('tanggal_buat','tanggal_setuju','status');
    }

}
