<?php

namespace App\Http\Controllers;

use App\Models\AccessPoint_m;
use Illuminate\Http\Request;
use PDF;

class AccessPoint extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $ap = AccessPoint_m::orderBy('sn', 'DESC')->paginate();
        //render view with posts
        return view('data-access-point.index',['title' => 'Data Access Point'], compact('ap'));
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
        AccessPoint_m::create([
             'sn'           => $request->sn,
             'merk_ap'      => $request->merkap,
             'tipe'         => $request->tipe,
             'nama_ap'      => $request->namaap,
             'letak'        => $request->letak,
             'tahun'        => $request->tahun
         ]);
         return redirect()->route('data-access-point.index')->with(['success' => 'Data Berhasil Disimpan!']);
     }
 
     /**
      * Display the specified resource.
      *
     * @param  \App\Models\AccessPoint_m  $accessPoint_m
     * @return \Illuminate\Http\Response
      */

    public function show(AccessPoint_m $accessPoint_m)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $accessPoint_m
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessPoint_m  $accessPoint_m
     * @return \Illuminate\Http\Response
     */

    public function edit(AccessPoint_m $accessPoint_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessPoint_m  $accessPoint_m
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, AccessPoint_m $accessPoint_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessPoint_m  $accessPoint_m
     * @return \Illuminate\Http\Response
     */

    public function ubah(Request $request)
    {
        $update = AccessPoint_m::where('sn', $request->sn)->firstOrfail();
        $update->sn             = $request->sn;
        $update->merk_ap        = $request->merkap; //kiri database, kanan nama field
        $update->tipe           = $request->tipe;
        $update->nama_ap        = $request->namaap;
        $update->letak          = $request->letak;
        $update->tahun          = $request->tahun;
        $update->save();
        return redirect()->route('data-access-point.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(AccessPoint_m $AccessPoint_m, Request $request)
     {
        AccessPoint_m::where('sn', $request->sn)->delete();
        return redirect()->route('data-access-point.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function getAPI($sn)
    {
        $server = AccessPoint_m::where('sn', $sn)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }

    public function getPDF(Request $request)
    {
        if ($request->tahun == 'semua'){
            $data = AccessPoint_m::all();
        } else {
            $data = AccessPoint_m::where('tahun', $request->tahun)->get();
        }

        $pdf = PDF::loadView('data-access-point.pdf', [
            'data' => $data
        ]);
        $nama = 'laporan AP '.$request->tahun.'.pdf';
        return $pdf->download($nama);
    }
}
