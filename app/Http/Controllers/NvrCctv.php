<?php

namespace App\Http\Controllers;

use App\Models\NvrCctv_m;
use Illuminate\Http\Request;
use PDF;

class NvrCctv extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $nvr = NvrCctv_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-nvr-cctv.index',['title' => 'Data NVR CCTV'], compact('nvr'));
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
        
        $file = $request->file('gambar')->store('foto/nvr', 'public');

            NvrCctv_m::create([
                'sn'         => $request->sn,
                'merk'       => $request->merknvr,
                'gambar'     => $file,
                'video_ch'   => $request->videoch,
                'hardisk'    => $request->hardisk,
                'penggunaan' => $request->penggunaan,
                'tahun'      => $request->tahun
            ]);
            // dd($request->gambar);
        
            return redirect()->route('data-nvr-cctv.index')->with(['success' => 'Data Berhasil Disimpan!']);
        // } else {
            // return redirect()->route('data-nvr-cctv.index')->with(['warning' => 'Gagal Disimpan!']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NvrCctv_m  $NvrCctv_m
     * @return \Illuminate\Http\Response
     */
    public function show(NvrCctv_m $NvrCctv_m)
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
     * @param  \App\Models\NvrCctv_m  $NvrCctv_m
     * @return \Illuminate\Http\Response
     */
    public function edit(NvrCctv_m $NvrCctv_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NvrCctv_m  $NvrCctv_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NvrCctv_m $NvrCctv_m)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NvrCctv_m  $NvrCctv_m
     * @return \Illuminate\Http\Response
     */

    public function ubah(Request $request)
    {

        $update = NvrCctv_m::where('id', $request->post_id)->firstOrfail();

        if ($request->gambar) {
            if (file_exists(storage_path('app/public/'.$update->gambar))) {
                \Storage::delete('public/'.$update->gambar);
                $file = $request->file('gambar')->store('foto/nvr', 'public');
                $update->gambar = $file;
            } else {
              $file = $request->file('gambar')->store('foto/nvr', 'public');
              $update->gambar = $file;
            }
        }

        $update->sn             = $request->sn;
        $update->merk           = $request->merknvr; //kiri database, kanan nama field
        $update->video_ch       = $request->videoch;
        $update->hardisk        = $request->hardisk;
        $update->penggunaan     = $request->penggunaan;
        $update->tahun          = $request->tahun;
        $update->save();
        
        return redirect()->route('data-nvr-cctv.index')->with(['success' => 'Data Berhasil Diupdate!']);

    }

    public function destroy(NvrCctv_m $NvrCctv_m, Request $request)
    {

        $data = NvrCctv_m::firstOrfail();
          if ($data) {
              \Storage::delete('public/'.$data->gambar);
        }
        NvrCctv_m::where('id', $request->id)->delete();

        return redirect()->route('data-nvr-cctv.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {
        $server = NvrCctv_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );

    }
    public function getPDF(Request $request)
    {
        if ($request->tahun == 'semua'){
            $data = NvrCctv_m::all();
        } else {
            $data = NvrCctv_m::where('tahun', $request->tahun)->get();
        }

        $pdf = PDF::loadView('data-nvr-cctv.pdf', [
            'data' => $data
        ]);
        $nama = 'laporan NRV CCTV '.$request->tahun.'.pdf';
        return $pdf->download($nama);
    }
}