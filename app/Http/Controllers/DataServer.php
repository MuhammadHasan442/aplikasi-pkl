<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server_m;
use PDF;

class DataServer extends Controller
{
    public function index()
    {
        //get posts
        // $server = Server_m::latest()->paginate(5);
        $server = Server_m::orderBy('sn', 'DESC')->paginate();

        //render view with posts
        return view('data-server.index',['title' => 'Data Server'], compact('server'));
    }

    public function create()
    {
        // KOSONG
    }

    public function store(Request $request)
    {
        Server_m::create([
            'sn'            => $request->sn,
            'merk_server'   => $request->merkserver,
            'jenis'         => $request->jenis,
            'hardisk'       => $request->hardisk,
            'ram'           => $request->ram,
            'processor'     => $request->processor,
            'os'            => $request->os,
            'tahun'         => $request->tahun,
            'penggunaan'    => $request->penggunaan
        ]);
        return redirect()->route('data-server.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(Server_m $server_m)
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
     * @param  \App\Models\Server_m  $perangkatJar_m
     * @return \Illuminate\Http\Response
     */
    public function edit(Server_m $server_m)
    {
        // KOSONG
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\server_m  $server_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // KOSONG
    }

    public function ubah(Request $request)
    {
        $update = Server_m::where('sn', $request->sn)->firstOrfail();
        $update->sn            = $request->sn;
        $update->merk_server   = $request->merkserver; //kiri database, kanan nama field
        $update->jenis         = $request->jenis;
        $update->processor     = $request->hardisk;
        $update->ram           = $request->ram;
        $update->hardisk       = $request->processor;
        $update->os            = $request->os;
        $update->tahun         = $request->tahun;
        $update->penggunaan    = $request->penggunaan;
        $update->save();
        return redirect()->route('data-server.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\server_m  $server_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server_m $server_m, Request $request)
    {
        Server_m::where('sn', $request->sn)->delete();
        return redirect()->route('data-server.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function getAPI($sn)
    {
        $server = Server_m::where('sn', $sn)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }
    public function getPDF(Request $request)
{
    if ($request->tahun == 'semua'){
        $data = Server_m::all();
    } else {
        $data = Server_m::where('tahun', $request->tahun)->get();
    }

    $pdf = PDF::loadView('data-server.pdf', [
        'data' => $data
    ]);
    $nama = 'laporan data Server '.$request->tahun.'.pdf';
    return $pdf->download($nama);
}
}
