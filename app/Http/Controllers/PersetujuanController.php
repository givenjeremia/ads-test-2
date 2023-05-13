<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Penyewaan;
use App\Models\Persetujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_login = Auth::user();
        $user = User::find($user_login->id);
        $data = $user->penyewaan()->get();
        return view('penyewaan.persetujuan',compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function show(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persetujuan  $persetujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persetujuan $persetujuan)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        $user_login = Auth::user();
        $id = $request->get('id');
        $value = $request->get('value');
        
        $penyewaan = Penyewaan::find($id);

        $penyewaan->persetujuan()->updateExistingPivot($user_login->id,[
                'tanggal_setuju' =>Carbon::now()->toDateString(),'status' => $value
            ]);
        $penyewaan->save();
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => 'Status Penyewaan Berhasil Di Update'
            ),
            200
        );
    }
}
