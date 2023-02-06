<?php

namespace App\Http\Controllers;

use App\Models\CctvPemko_m;
use Illuminate\Http\Request;
use PDF;

class CctvPemko extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $pemko = CctvPemko_m::orderBy('sn', 'DESC')->paginate();

        //render view with posts
        return view('data-cctv-pemko.index',['title' => 'Data CCTV Pemerintah Kota'], compact('pemko'));
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
          CctvPemko_m::create([
                'sn'            => $request->sn,
                'merk_cctv'     => $request->merkcctv,
                'tipe'          => $request->tipe,
                'letak'         => $request->letak,
                'tahun'         => $request->tahun
         ]);
         return redirect()->route('data-cctv-pemko.index')->with(['success' => 'Data Berhasil Disimpan!']);
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\CctvPemko_m  $cctvPemko_m
      * @return \Illuminate\Http\Response
      */

    public function show(CctvPemko_m $cctvPemko_m)
    {
        //return response
         return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CctvPemko_m  $cctvPemko_m
     * @return \Illuminate\Http\Response
     */

    public function edit(CctvPemko_m $cctvPemko_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CctvPemko_m  $cctvPemko_m
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, CctvPemko_m $cctvPemko_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CctvPemko_m  $cctvPemko_m
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request)
    {
        $update = CctvPemko_m::where('sn', $request->sn)->firstOrfail();
        $update->sn             = $request->sn;
        $update->merk_cctv      = $request->merkcctv; //kiri database, kanan nama field
        $update->tipe           = $request->tipe;
        $update->letak          = $request->letak;
        $update->tahun          = $request->tahun;
        $update->save();
        return redirect()->route('data-cctv-pemko.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(CctvPemko_m $CctvPemko_m, Request $request)
     {
        CctvPemko_m::where('sn', $request->sn)->delete();
        return redirect()->route('data-cctv-pemko.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function getAPI($sn)
    {
        $server = CctvPemko_m::where('sn', $sn)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }
    public function getPDF(Request $request)
{
    if ($request->tahun == 'semua'){
        $data = CctvPemko_m::all();
    } else {
        $data = CctvPemko_m::where('tahun', $request->tahun)->get();
    }

    $pdf = PDF::loadView('data-cctv-pemko.pdf', [
        'data' => $data
    ]);
    $nama = 'laporan pemko '.$request->tahun.'.pdf';
    return $pdf->download($nama);
}
}



