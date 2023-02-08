<?php

namespace App\Http\Controllers;

use App\Models\PerangkatJar_m;
use Illuminate\Http\Request;
use PDF;

class PerangkatJar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $jaringan = PerangkatJar_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-perangkat-jaringan.index',['title' => 'Data Perangkat Jaringan'], compact('jaringan'));
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
         PerangkatJar_m::create([
            'sn'                    => $request->sn,
            'merk_perangkat'        => $request->merkperangkat,
            'cpu'                   => $request->cpu,
            'ram'                   => $request->ram,
            'lan_port'              => $request->lanport,
            'tahun'                 => $request->tahun
        ]);
        return redirect()->route('data-perangkat-jaringan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerangkatJar_m  $perangkatJar_m
     * @return \Illuminate\Http\Response
     */
    public function show(PerangkatJar_m $perangkatJar_m)
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
     * @param  \App\Models\PerangkatJar_m  $perangkatJar_m
     * @return \Illuminate\Http\Response
     */
    public function edit(PerangkatJar_m $perangkatJar_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerangkatJar_m  $perangkatJar_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerangkatJar_m $perangkatJar_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerangkatJar_m  $perangkatJar_m
     * @return \Illuminate\Http\Response
     */

    public function ubah(Request $request)
    {
        $update = PerangkatJar_m::where('id', $request->post_id)->firstOrfail();
        $update->sn                = $request->sn;
        $update->merk_perangkat    = $request->merkperangkat; //kiri database, kanan nama field
        $update->cpu               = $request->cpu;
        $update->ram               = $request->ram;
        $update->lan_port          = $request->lanport;
        $update->tahun             = $request->tahun;
        $update->save();
        return redirect()->route('data-perangkat-jaringan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    public function destroy(PerangkatJar_m $perangkatJar_m, Request $request)
     {
        PerangkatJar_m::where('id', $request->id)->delete();
        return redirect()->route('data-perangkat-jaringan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function getAPI($id)
    {
        $server = PerangkatJar_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }
    public function getPDF(Request $request)
{
    if ($request->tahun == 'semua'){
        $data = PerangkatJar_m::all();
    } else {
        $data = PerangkatJar_m::where('tahun', $request->tahun)->get();
    }

    $pdf = PDF::loadView('data-perangkat-jaringan.pdf', [
        'data' => $data
    ]);
    $nama = 'laporan perangkat jaringan '.$request->tahun.'.pdf';
    return $pdf->download($nama);
}
}
