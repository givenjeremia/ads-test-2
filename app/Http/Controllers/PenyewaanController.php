<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers = Driver::where('status', 1)->get();
        $kendaraans = Kendaraan::where('jadwal_service', '!=', Carbon::now()->toDateString())->get();
        $supervisis = User::where('role', 1)->get();
        $manajers = User::where('role', 2)->get();
        $penyewaan = Penyewaan::all();
        return view('penyewaan.index', compact('penyewaan', 'drivers', 'kendaraans', 'supervisis', 'manajers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'tanggal_sewa' => 'required',
            'waktu_sewa' => 'required',
            'kendaraan_id' => 'required',
            'driver_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('penyewaan.index')->with('gagal', 'Jangan Sampai Kosong!');
        } else {
            // Checking 
            $penyewaan = Penyewaan::where([
                ["tanggal", $request->get('tanggal_sewa')],
                ["waktu",$request->get('waktu_sewa')],
                ["kendaraan_id", $request->get('kendaraan_id')],
                ["driver_id", $request->get('driver_id')],
            ])->get();
            if (count($penyewaan) > 0) {
                return redirect()->route('penyewaan.index')->with('gagal', 'Penyewaan Gagal, Kendaraan Atau Driver Sudah Di Sewa');
            } else {
                $new = new Penyewaan();
                $new->tanggal = $request->get('tanggal_sewa');
                $new->waktu = $request->get('waktu_sewa');
                $new->keterangan = $request->get('keterangan');
                $kendaraan = Kendaraan::find($request->get('kendaraan_id'));
                $kendaraan->penyewaan()->save($new);
                $driver = Driver::find($request->get('driver_id'));
                $driver->penyewaan()->save($new);
                $new->persetujuan()->attach($request->get('manajer_id'), [
                    'tanggal_buat' => Carbon::now()->toDateString(),
                    'status' => 0
                ]);
                $new->persetujuan()->attach($request->get('supervisor_id'), [
                    'tanggal_buat' => Carbon::now()->toDateString(),
                    'status' => 0
                ]);
                return redirect()->route('penyewaan.index')->with('success', 'Berhasil Tambah Penyewaan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewaan $penyewaan)
    {
        //
        $validator = Validator::make($request->all(), [
            'tanggal_sewa' => 'required',
            'waktu_sewa' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('penyewaan.index')->with('gagal', 'Gagal Update Penyewaan');
        } else {
            $penyewaan->tanggal = $request->get('tanggal_sewa');
            $penyewaan->waktu = $request->get('waktu_sewa');
            $penyewaan->keterangan = $request->get('keterangan');
            $penyewaan->save();
            return redirect()->route('penyewaan.index')->with('success', 'Berhasil Update Penyewaan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyewaan $penyewaan)
    {
        //

    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Penyewaan::find($id);

        // dd($data);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('penyewaan.update', compact('data'))->render()
        ), 200);
    }
}
