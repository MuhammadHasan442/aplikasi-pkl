<?php

namespace App\Http\Controllers;

use App\Models\MerkBarang_m;
use Illuminate\Http\Request;

class MerkBarang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $publik = MerkBarang_m::orderBy('id', 'DESC')->paginate();

        //render view with posts
        return view('data-merk.index',['title' => 'Data Merk Barang'], compact('publik'));

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

        // $request->validate([
        //     'merk'       => 'required|max:255',
        //     'keterangan' => 'required',
        // ], [
        //     'merk.required'       => 'Nama Merk harus diisi',
        //     'merk.max'            => 'Nama Merk maksimal 255 karakter',
        //     'keterangan.required' => 'Keterangan harus diisi',
        // ]);

        if (MerkBarang_m::where('nama', $request->merk)->exists()) {

            return redirect()->route('data-merk.index')->with(['warning' => 'Nama Merk Sudah Ada!']);

        } else {

            MerkBarang_m::create([
                'nama'          => $request->merk,
                'keterangan'    => $request->keterangan,
            ]);

            return redirect()->route('data-merk.index')->with(['success' => 'Data Berhasil Disimpan!']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerkBarang_m  $merkBarang_m
     * @return \Illuminate\Http\Response
     */
    public function show(MerkBarang_m $merkBarang_m)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerkBarang_m  $merkBarang_m
     * @return \Illuminate\Http\Response
     */
    public function edit(MerkBarang_m $merkBarang_m)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerkBarang_m  $merkBarang_m
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $update = MerkBarang_m::where('id', $request->post_id)->firstOrfail();

        if (MerkBarang_m::where('nama', $request->merk)->where('id', '!=', $request->post_id)->exists()) {

            return redirect()->route('data-merk.index')->with(['warning' => 'Nama Merk Sudah Ada!']);

        } else {

            $update->nama             = $request->merk;
            $update->keterangan       = $request->keterangan;
            $update->save();

            return redirect()->route('data-merk.index')->with(['info' => 'Data Berhasil Diupdate!']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerkBarang_m  $merkBarang_m
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        MerkBarang_m::where('id', $request->id)->delete();

        return redirect()->route('data-merk.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }

    public function getAPI($id)
    {

        $server = MerkBarang_m::where('id', $id)->get();

        return response()->json($server, 200, ['pesan' => 'success'] );
    }

}
