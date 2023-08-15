<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan_m;
use Illuminate\Http\Request;
use PDF;

class Pemeliharaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pelihara = Pemeliharaan_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('pemeliharaan-perangkat.index',['title' => 'Data Pemeliharaan Perangkat'], compact('pelihara'));

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

                $file = $request->file('gambar')->store('foto/pemeliharaan', 'public');

            } else {

                $file = 'null';

            }

            Pemeliharaan_m::create([
                'nama_barang'   => $request->nama,
                'unit'          => $request->unit,
                'satuan'        => $request->satuan,
                'gambar'        => $file,
                'harga'         => $request->harga,
                'total_harga'   => $request->total,
                'ekatalog'      => $request->ekatalog,
                'nego'          => $request->nego,
                'link'          => $request->link,
            ]);

            return redirect()->route('pemeliharaan-perangkat.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (\Throwable $th) {

            return redirect()->route('pemeliharaan-perangkat.index')->with(['warning' => 'Pastikan semua field mengikuti tipe data yang benar.']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeliharaan_m  $pemeliharaan_m
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeliharaan_m $pemeliharaan_m)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeliharaan_m  $pemeliharaan_m
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeliharaan_m $pemeliharaan_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeliharaan_m  $pemeliharaan_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $update = Pemeliharaan_m::where('id', $request->post_id)->firstOrfail();

        try {

            if ($request->gambar) {
                if (file_exists(storage_path('app/public/'.$update->gambar))) {
                    \Storage::delete('public/'.$update->gambar);
                    $file = $request->file('gambar')->store('foto/pemeliharaan', 'public');
                    $update->gambar = $file;
                } else {
                    $file = $request->file('gambar')->store('foto/pemeliharaan', 'public');
                    $update->gambar = $file;
                }
            }

            $update->nama_barang     = $request->nama;
            $update->unit            = $request->unit;
            $update->satuan          = $request->satuan;
            $update->harga           = $request->harga;
            $update->total_harga     = $request->total;
            $update->ekatalog        = $request->ekatalog;
            $update->nego            = $request->nego;
            $update->link            = $request->link;
            $update->save();

            return redirect()->route('pemeliharaan-perangkat.index')->with(['success' => 'Data Berhasil Diupdate!']);

        } catch (\Throwable $th) {

            return redirect()->route('pemeliharaan-perangkat.index')->with(['warning' => 'IP Sudah Ada!']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeliharaan_m  $pemeliharaan_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeliharaan_m $pemeliharaan_m, Request $request)
    {

        $data = Pemeliharaan_m::firstOrfail();
        if ($data) {
            \Storage::delete('public/'.$data->gambar);
        }

        Pemeliharaan_m::where('id', $request->id)->delete();

        return redirect()->route('pemeliharaan-perangkat.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {

        $server = Pemeliharaan_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }

    public function getPDF(Request $request)
    {

        $harga1 = $request->minharga;
        $harga2 = $request->maxharga;

        if ($harga2 == 0){

            $data = Pemeliharaan_m::where('harga', '>=', $harga1)->get();

        } else if ($harga1 == 0) {

            $data = Pemeliharaan_m::where('harga', '<=', $harga2)->get();

        } else if ($harga1 && $harga2 !== 0) {

            $data = Pemeliharaan_m::whereBetween('harga', [$harga1, $harga2])->get();

        } else {

            $data = Pemeliharaan_m::all();

        }

        $pdf = PDF::loadView('pemeliharaan-perangkat.pdf', [
            'data' => $data
        ])->setPaper('A4', 'Landscape');

        $nama = 'laporan-pemeliharaan-perangkat-dari-Rp.'.$harga1.'.pdf';
        return $pdf->download($nama);

    }

    public function viewPrint(Request $request)
    {

        $harga1 = $request->minharga;
        $harga2 = $request->maxharga;

        if ($harga2 == 0){

            $data = Pemeliharaan_m::where('harga', '>=', $harga1)->get();

        } else if ($harga1 == 0) {

            $data = Pemeliharaan_m::where('harga', '<=', $harga2)->get();

        } else if ($harga1 && $harga2 !== 0) {

            $data = Pemeliharaan_m::whereBetween('harga', [$harga1, $harga2])->get();

        } else {

            $data = Pemeliharaan_m::all();

        }

        return view('pemeliharaan-perangkat.view', compact('data'));
    }
}
