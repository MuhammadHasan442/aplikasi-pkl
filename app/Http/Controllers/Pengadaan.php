<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan_m;
use Illuminate\Http\Request;

class Pengadaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $publik = Pengadaan_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('pengadaan-perangkat.index',['title' => 'Data Pengadaan Perangkat'], compact('publik'));

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

                $file = $request->file('gambar')->store('foto/pengadaan', 'public');

            } else {

                $file = 'null';

            }

            Pengadaan_m::create([
                'gambar'     => $file,
                'uraian'     => $request->uraian,
                'volume'     => $request->volume,
                'unit'       => $request->unit,
                'harga'      => $request->harga,
                'jumlah'     => $request->jumlah
            ]);

            return redirect()->route('pengadaan-perangkat.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Throwable $th) {

            return redirect()->route('pengadaan-perangkat.index')->with(['warning' => 'Pastikan semua field mengikuti tipe data yang benar!']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengadaan_m  $pengadaan_m
     * @return \Illuminate\Http\Response
     */
    public function show(Pengadaan_m $pengadaan_m)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengadaan_m  $pengadaan_m
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengadaan_m $pengadaan_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengadaan_m  $pengadaan_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $update = Pengadaan_m::where('id', $request->post_id)->firstOrfail();

        if ($request->gambar) {
            if (file_exists(storage_path('app/public/'.$update->gambar))) {
                \Storage::delete('public/'.$update->gambar);
                $file = $request->file('gambar')->store('foto/pengadaan', 'public');
                $update->gambar = $file;
            } else {
              $file = $request->file('gambar')->store('foto/pengadaan', 'public');
              $update->gambar = $file;
            }
        }

        $update->uraian     = $request->uraian;
        $update->volume     = $request->volume;
        $update->unit       = $request->unit;
        $update->harga      = $request->harga;
        $update->jumlah     = $request->jumlah;
        $update->save();

        return redirect()->route('pengadaan-perangkat.index')->with(['success' => 'Data Berhasil Diupdate!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengadaan_m  $pengadaan_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengadaan_m $pengadaan_m, Request $request)
    {

        $data = Pengadaan_m::firstOrfail();
        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        Pengadaan_m::where('id', $request->id)->delete();

        return redirect()->route('pengadaan-perangkat.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {

        $server = Pengadaan_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }

    public function getPDF(Request $request)
    {

        if ($request->tahun == 'semua'){
            $data = Pengadaan_m::all();
        } else {
            $data = Pengadaan_m::where('tahun', $request->tahun)->get();
        }

        $pdf = PDF::loadView('pengadaan-perangkat.pdf', [
            'data' => $data
        ]);

        $nama = 'laporan wifi publik - '.$request->tahun.'.pdf';
        return $pdf->download($nama);
    }
}
