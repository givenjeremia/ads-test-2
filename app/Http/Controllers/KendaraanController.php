<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index',compact('kendaraans'));
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
            'nama_kendaraan' => 'required',
            'komsumsi_bahan_bakar' => 'required',
            'jadwal_service' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->route('kendaraan.index')->with('gagal', 'Gagal Tambah Kendaraan');
        }
        else{
            $new = new Kendaraan();
            $new->nama = $request->get('nama_kendaraan');
            $new->komsumsi = $request->get('komsumsi_bahan_bakar');
            $new->jadwal_service = $request->get('jadwal_service');
            $new->save();
            return redirect()->route('kendaraan.index')->with('success', 'Berhasil Tambah Kendaraan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_kendaraan' => 'required',
            'komsumsi_bahan_bakar' => 'required',
            'jadwal_service' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->route('kendaraan.index')->with('gagal', 'Gagal Update Kendaraan');
        }
        else{
            $kendaraan->nama = $request->get('nama_kendaraan');
            $kendaraan->komsumsi = $request->get('komsumsi_bahan_bakar');
            $kendaraan->jadwal_service = $request->get('jadwal_service');
            $kendaraan->save();
            return redirect()->route('kendaraan.index')->with('success', 'Berhasil Update Kendaraan');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
    }

    public function getEditForm(Request $request){
        $id=$request->get('id');
        $data= Kendaraan::find($id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('kendaraan.update',compact('data'))->render()
        ),200);
    }

}
