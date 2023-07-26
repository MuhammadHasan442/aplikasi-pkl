<?php

namespace App\Http\Controllers;

use App\Models\PerangkatRusak_m;
use App\Models\AccessPoint_m;
use App\Models\CctvPemko_m;
use App\Models\CctvPublik_m;
use App\Models\NvrCctv_m;
use App\Models\PerangkatJar_m;
use App\Models\Server_m;
use App\Models\WifiPublik_m;
use Illuminate\Http\Request;

class PerangkatRusak extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $publik = PerangkatRusak_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('perangkat-rusak.index',['title' => 'Data Perangkat Rusak'], compact('publik'));

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

                $file = $request->file('gambar')->store('foto/rusak', 'public');

            } else {

                $file = 'null';

            }

            if ($request->kategori == 'server') {

                $kategori = 'Server';

            } if ($request->kategori == 'perangkatjar') {

                $kategori = 'Perangkat Jaringan';

            } if ($request->kategori == 'ap') {

                $kategori = 'Access Point';

            } if ($request->kategori == 'nvr') {

                $kategori = 'NVR CCTV';

            } if ($request->kategori == 'cctv-pemko') {

                $kategori = 'CCTV Pemko';

            } if ($request->kategori == 'cctv-publik') {

                $kategori = 'CCTV Publik';

            } if ($request->kategori == 'wifi-publik') {

                $kategori = 'Wifi Publik';

            }

            PerangkatRusak_m::create([
                'gambar'       => $file,
                'kategori'     => $kategori,
                'sn'           => $request->sn,
                'merk'         => $request->merk,
                'tahun'        => $request->tahun,
                'status'       => $request->status,
                'keterangan'   => $request->keterangan
            ]);

            return redirect()->route('perangkat-rusak.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Throwable $th) {

            return redirect()->route('perangkat-rusak.index')->with(['warning' => 'Pastikan semua field mengikuti tipe data yang benar!']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerangkatRusak_m  $perangkatRusak_m
     * @return \Illuminate\Http\Response
     */
    public function show(PerangkatRusak_m $perangkatRusak_m)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerangkatRusak_m  $perangkatRusak_m
     * @return \Illuminate\Http\Response
     */
    public function edit(PerangkatRusak_m $perangkatRusak_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerangkatRusak_m  $perangkatRusak_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerangkatRusak_m $perangkatRusak_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerangkatRusak_m  $perangkatRusak_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerangkatRusak_m $perangkatRusak_m, Request $request)
    {

        $data = PerangkatRusak_m::firstOrfail();
        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        PerangkatRusak_m::where('id', $request->id)->delete();

        return redirect()->route('pengadaan-perangkat.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {

        $server = PerangkatRusak_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }

    public function getData($value)
    {
        if ($value == 'server') {

            $data = Server_m::all();

        } if ($value == 'perangkatjar') {

            $data = PerangkatJar_m::all();

        } if ($value == 'ap') {

            $data = AccessPoint_m::all();

        } if ($value == 'nvr') {

            $data = NvrCctv_m::all();

        } if ($value == 'cctv-pemko') {

            $data = CctvPemko_m::all();

        } if ($value == 'cctv-publik') {

            $data = CctvPublik_m::all();

        } if ($value == 'wifi-publik') {

            $data = WifiPublik_m::all();

        }

        return response()->json($data, 200, ['pesan' => 'success'] );

    }
}
