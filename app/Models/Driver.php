<?php

namespace App\Models;

use App\Models\Penyewaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    protected $table = "driver";

    public function penyewaan(){
        return $this->hasMany(Penyewaan::class,'driver_id','id');
    }
    
}
