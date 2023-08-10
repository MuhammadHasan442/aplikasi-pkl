<?php

namespace App\Http\Controllers;

use App\Models\CctvPublik_m;
use Illuminate\Http\Request;

class CctvPublik extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $publik = CctvPublik_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-cctv-publik.index',['title' => 'Data CCTV Publik Kota Banjarmasin'], compact('publik'));
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

            $cek = CctvPublik_m::where('ip', $request->ip)->first();
            if ($cek == null) {

                $file = $request->file('gambar')->store('foto/cctv-publik', 'public');

                CctvPublik_m::create([
                    'sn'            => $request->sn,
                    'ip'            => $request->ip,
                    'merk'          => $request->merkcctv,
                    'gambar'        => $file,
                    'tipe'          => $request->tipe,
                    'letak'         => $request->letak,
                    'tahun'         => $request->tahun
               ]);

               return redirect()->route('data-cctv-publik.index')->with(['success' => 'Data Berhasil Disimpan!']);

            } else {

                throw new Exception("Data IP Sudah Ada");

            }

        } catch (\Throwable $th) {

            return redirect()->route('data-cctv-publik.index')->with(['warning' => 'IP Sudah Ada!']);

        }
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Models\CctvPublik_m  $cctvPublik_m
      * @return \Illuminate\Http\Response
      */

    public function show(CctvPublik_m $cctvPublik_m)
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
     * @param  \App\Models\CctvPublik_m  $cctvPublik_m
     * @return \Illuminate\Http\Response
     */

    public function edit(CctvPublik_m $cctvPublik_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CctvPublik_m  $cctvPublik_m
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, CctvPublik_m $cctvPublik_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CctvPublik_m  $cctvPublik_m
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request)
    {

        $update = CctvPublik_m::where('id', $request->post_id)->firstOrfail();

        try {

            $cek = CctvPublik_m::where('ip', $request->ip)->where('id', '!=', $request->post_id)->first();
            
            if ($cek == null) {

                if ($request->gambar) {
                    if (file_exists(storage_path('app/public/'.$update->gambar))) {
                        \Storage::delete('public/'.$update->gambar);
                        $file = $request->file('gambar')->store('foto/cctv-publik', 'public');
                        $update->gambar = $file;
                    } else {
                      $file = $request->file('gambar')->store('foto/cctv-publik', 'public');
                      $update->gambar = $file;
                    }
                }

                $update->sn             = $request->sn;
                $update->ip             = $request->ip;
                $update->merk      = $request->merkcctv;
                $update->tipe           = $request->tipe;
                $update->letak          = $request->letak;
                $update->tahun          = $request->tahun;
                $update->save();

                return redirect()->route('data-cctv-publik.index')->with(['info' => 'Data Berhasil Diupdate!']);

            } else {

                throw new Exception("Data IP Sudah Ada");

            }

        } catch (\Throwable $th) {

            return redirect()->route('data-cctv-publik.index')->with(['warning' => 'IP Sudah Ada!']);

        }
    }

    public function destroy(CctvPublik_m $CctvPublik_m, Request $request)
    {

        $data = CctvPublik_m::firstOrfail();

        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        CctvPublik_m::where('id', $request->id)->delete();

        return redirect()->route('data-cctv-publik.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    public function getAPI($id)
    {
        $server = CctvPublik_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }
    public function getPDF(Request $request)
    {
        if ($request->tahun == 'semua'){
            $data = CctvPublik_m::all();
        } else {
            $data = CctvPublik_m::where('tahun', $request->tahun)->get();
        }

        $pdf = PDF::loadView('data-cctv-publik.pdf', [
            'data' => $data
        ]);
        $nama = 'laporan cctv publik - '.$request->tahun.'.pdf';
        return $pdf->download($nama);
    }
}
