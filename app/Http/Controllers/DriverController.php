<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers = Driver::All();
        return view('driver.index', compact('drivers'));
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
            'nama_driver' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('driver.index')->with('gagal', 'Gagal Tambah Driver');
        } else {
            $new = new Driver();
            $new->nama = $request->get("nama_driver");
            $new->keterangan = $request->get("keterangan");
            $status = $request->get("ready_status") ? $request->get("ready_status") : 0;
            $new->status = $status;
            $new->save();
            return redirect()->route('driver.index')->with('success', 'Berhasil Tambah Driver');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_driver' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('driver.index')->with('gagal', 'Berhasil Update Driver');
        } else {
            $driver->nama = $request->get("nama_driver");
            $driver->keterangan = $request->get("keterangan");
            $status = $request->get("ready_status") ? $request->get("ready_status") : 0;
            $driver->status = $status;
            $driver->save();
            return redirect()->route('driver.index')->with('success', 'Berhasil Update Driver');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Driver::find($id);

        // dd($data);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('driver.update', compact('data'))->render()
        ), 200);
    }
}
