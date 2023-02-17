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
        $server = Server_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-server.index',['title' => 'Data Server'], compact('server'));
    }

    public function create()
    {
        // KOSONG
    }

    public function store(Request $request)
    {
        try {
            $cek = Server_m::where('ip', $request->ip)->first();
            if ($cek == null) {
                Server_m::create([
                    'sn'            => $request->sn,
                    'ip'            => $request->ip,
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
            } else {
                throw new Exception("Data IP Sudah Ada");
            }
        } catch (\Throwable $th) {
            return redirect()->route('data-server.index')->with(['warning' => 'IP Sudah Ada!']);
        }
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
        try {
            $cek = Server_m::where('ip', $request->ip)->where('id', '!=', $request->post_id)->first();
            if ($cek == null) {
                $update = Server_m::where('id', $request->post_id)->firstOrfail();
                $update->sn            = $request->snok;
                $update->ip            = $request->ip;
                $update->merk_server   = $request->merkserver;
                $update->jenis         = $request->jenis;
                $update->processor     = $request->processor;
                $update->ram           = $request->ram;
                $update->hardisk       = $request->hardisk;
                $update->os            = $request->os;
                $update->tahun         = $request->tahun;
                $update->penggunaan    = $request->penggunaan;
                $update->save();
                return redirect()->route('data-server.index')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                throw new Exception("Data IP Sudah Ada");
            }
        } catch (\Throwable $th) {
            return redirect()->route('data-server.index')->with(['warning' => 'IP Sudah Ada!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\server_m  $server_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server_m $server_m, Request $request)
    {
        Server_m::where('id', $request->id)->delete();
        return redirect()->route('data-server.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function getAPI($id)
    {
        $server = Server_m::where('id', $id)->get();

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
    ])->setPaper('A4', 'Landscape');

    $nama = 'laporan data Server '.$request->tahun.'.pdf';
    return $pdf->download($nama);

    // return view('data-server.pdf',['title' => 'Data Server'], compact('data'));

}
}
