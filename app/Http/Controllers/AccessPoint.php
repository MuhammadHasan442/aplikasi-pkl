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
        $ap = AccessPoint_m::orderBy('id', 'DESC')->paginate();
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

        $this->validate($request, [
            'gambar' => 'required',
            'gambar.*' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        try {

            $cek = AccessPoint_m::where('ip', $request->ip)->first();
            if ($cek == null) {

                $file = $request->file('gambar')->store('foto/ap', 'public');

                AccessPoint_m::create([
                    'sn'           => $request->sn,
                    'ip'           => $request->ip,
                    'merk_ap'      => $request->merkap,
                    'gambar'       => $file,
                    'tipe'         => $request->tipe,
                    'nama_ap'      => $request->namaap,
                    'letak'        => $request->letak,
                    'tahun'        => $request->tahun
                ]);

                return redirect()->route('data-access-point.index')->with(['success' => 'Data Berhasil Disimpan!']);

            } else {

                throw new Exception("Data IP Sudah Ada");

            }
        } catch (\Throwable $th) {

            return redirect()->route('data-access-point.index')->with(['warning' => 'IP Sudah Ada!']);

        }
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

        $update = AccessPoint_m::where('id', $request->post_id)->firstOrfail();

        try {

            $cek = AccessPoint_m::where('ip', $request->ip)->where('id', '!=', $request->post_id)->first();

            if ($cek == null) {

                if ($request->gambar) {
                    if (file_exists(storage_path('app/public/'.$update->gambar))) {
                        \Storage::delete('public/'.$update->gambar);
                        $file = $request->file('gambar')->store('foto/ap', 'public');
                        $update->gambar = $file;
                    } else {
                      $file = $request->file('gambar')->store('foto/ap', 'public');
                      $update->gambar = $file;
                    }
                }

                $update->sn             = $request->sn;
                $update->ip             = $request->ip;
                $update->merk_ap        = $request->merkap; //kiri database, kanan nama field
                $update->tipe           = $request->tipe;
                $update->nama_ap        = $request->namaap;
                $update->letak          = $request->letak;
                $update->tahun          = $request->tahun;
                $update->save();

                return redirect()->route('data-access-point.index')->with(['info' => 'Data Berhasil Diupdate!']);

            } else {

                throw new Exception("Data IP Sudah Ada");

            }

        } catch (\Throwable $th) {

            return redirect()->route('data-access-point.index')->with(['warning' => 'IP Sudah Ada!']);

        }
    }

    public function destroy(AccessPoint_m $AccessPoint_m, Request $request)
    {

        $data = AccessPoint_m::firstOrfail();
        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        AccessPoint_m::where('id', $request->id)->delete();

        return redirect()->route('data-access-point.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
    public function getAPI($id)
    {
        $server = AccessPoint_m::where('id', $id)->get();

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
