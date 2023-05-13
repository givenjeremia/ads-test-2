<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemakaians = Kendaraan::join('penyewaan', 'kendaraan.id', '=', 'penyewaan.kendaraan_id')
        ->selectRaw('kendaraan.nama, count(penyewaan.kendaraan_id) as pemakaian')
        ->groupBy('kendaraan.nama')
        ->get();
  
  
        // dd($pemakaians);
        return view('layouts.dashboard',compact('pemakaians'));
    }
}
