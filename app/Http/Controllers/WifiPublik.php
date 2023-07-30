<?php

namespace App\Http\Controllers;

use App\Models\WifiPublik_m;
use Illuminate\Http\Request;

class WifiPublik extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $publik = WifiPublik_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-wifi-publik.index',['title' => 'Data WIFI Publik Kota Banjarmasin'], compact('publik'));

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
            // 'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        try {

            if ($request->gambar) {

                $file = $request->file('gambar')->store('foto/wifi-publik', 'public');

            } else {

                $file = 'null';

            }

            WifiPublik_m::create([
                'sn'            => $request->sn,
                'merk'          => $request->merk,
                'gambar'        => $file,
                'ssid'          => $request->ssid,
                'letak'         => $request->letak,
                'tahun'         => $request->tahun
            ]);

            return redirect()->route('data-wifi-publik.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Throwable $th) {

            return redirect()->route('data-wifi-publik.index')->with(['warning' => 'Pastikan semua field mengikuti tipe data yang benar!']);

        }

     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Models\WifiPublik_m  $WifiPublik_m
      * @return \Illuminate\Http\Response
      */

    public function show(WifiPublik_m $WifiPublik_m)
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
     * @param  \App\Models\WifiPublik_m  $WifiPublik_m
     * @return \Illuminate\Http\Response
     */

    public function edit(WifiPublik_m $WifiPublik_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WifiPublik_m  $WifiPublik_m
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, WifiPublik_m $WifiPublik_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WifiPublik_m  $WifiPublik_m
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request)
    {

        $update = WifiPublik_m::where('id', $request->post_id)->firstOrfail();

        if ($request->gambar) {
            if (file_exists(storage_path('app/public/'.$update->gambar))) {
                \Storage::delete('public/'.$update->gambar);
                $file = $request->file('gambar')->store('foto/wifi-publik', 'public');
                $update->gambar = $file;
            } else {
              $file = $request->file('gambar')->store('foto/wifi-publik', 'public');
              $update->gambar = $file;
            }
        }

        $update->sn             = $request->sn;
        $update->merk           = $request->merkwifi;
        $update->ssid           = $request->ssid;
        $update->letak          = $request->letak;
        $update->tahun          = $request->tahun;
        $update->save();

        return redirect()->route('data-wifi-publik.index')->with(['success' => 'Data Berhasil Diupdate!']);

    }

    public function destroy(WifiPublik_m $WifiPublik_m, Request $request)
    {

        $data = WifiPublik_m::firstOrfail();
        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        WifiPublik_m::where('id', $request->id)->delete();

        return redirect()->route('data-wifi-publik.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {

        $server = WifiPublik_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }

    public function getPDF(Request $request)
    {

        if ($request->tahun == 'semua'){
            $data = WifiPublik_m::all();
        } else {
            $data = WifiPublik_m::where('tahun', $request->tahun)->get();
        }

        $pdf = PDF::loadView('data-wifi-publik.pdf', [
            'data' => $data
        ]);

        $nama = 'laporan wifi publik - '.$request->tahun.'.pdf';
        return $pdf->download($nama);
    }
}
