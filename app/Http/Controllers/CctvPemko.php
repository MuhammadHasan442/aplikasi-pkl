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
        $pemko = CctvPemko_m::orderBy('id', 'DESC')->paginate();

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
        $this->validate($request, [ 
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|max:2048'
        ]);      

        try {
            $cek = CctvPemko_m::where('ip', $request->ip)->first();
            if ($cek == null) {
                
                $file = $request->file('gambar')->store('foto/cctv-pemko', 'public');

                CctvPemko_m::create([
                      'sn'            => $request->sn,
                      'ip'            => $request->ip,
                      'merk_cctv'     => $request->merkcctv,
                      'gambar'        => $file,
                      'tipe'          => $request->tipe,
                      'letak'         => $request->letak,
                      'tahun'         => $request->tahun
               ]);
               return redirect()->route('data-cctv-pemko.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                throw new Exception("Data IP Sudah Ada");
            }
        } catch (\Throwable $th) {
            return redirect()->route('data-cctv-pemko.index')->with(['warning' => 'IP Sudah Ada!']);
        }
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
        $update = CctvPemko_m::where('id', $request->post_id)->firstOrfail();

        try {
            $cek = CctvPemko_m::where('ip', $request->ip)->where('id', '!=', $request->post_id)->first();
            if ($cek == null) {

                if ($request->gambar) {
                    if (file_exists(storage_path('app/public/'.$update->gambar))) {
                        \Storage::delete('public/'.$update->gambar);
                        $file = $request->file('gambar')->store('foto/cctv-pemko', 'public');
                        $update->gambar = $file;
                    } else {
                      $file = $request->file('gambar')->store('foto/cctv-pemko', 'public');
                      $update->gambar = $file;
                    }
                }
                
                $update->sn             = $request->sn;
                $update->ip             = $request->ip;
                $update->merk_cctv      = $request->merkcctv;
                $update->tipe           = $request->tipe;
                $update->letak          = $request->letak;
                $update->tahun          = $request->tahun;
                $update->save();

                return redirect()->route('data-cctv-pemko.index')->with(['info' => 'Data Berhasil Diupdate!']);
            } else {
                throw new Exception("Data IP Sudah Ada");
            }
        } catch (\Throwable $th) {
            return redirect()->route('data-cctv-pemko.index')->with(['warning' => 'IP Sudah Ada!']);
        }
    }

    public function destroy(CctvPemko_m $CctvPemko_m, Request $request)
    {

        $data = CctvPemko_m::firstOrfail();
          if ($data) {
              \Storage::delete('public/'.$data->gambar);
        }
        CctvPemko_m::where('id', $request->id)->delete();

        return redirect()->route('data-cctv-pemko.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    public function getAPI($id)
    {
        $server = CctvPemko_m::where('id', $id)->get();

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



