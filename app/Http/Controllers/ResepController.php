<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use App\Models\Kota;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = Resep::with('user','kota','kategori')->where('status', 'Proses')->get();
        return view('admin.resep.index', compact('reseps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        $users = User::all();
        return view('admin.resep.create', compact('kotas','kategoris','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'user_id' => 'required',
            'kota_id' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'gambar_resep' => 'required',
            'deskripsi' => 'required',
            'bahan_bahan' => 'required',
            'langkah_langkah' => 'required',
        ]);

        $reseps = new Resep();
        $reseps->user_id = $request->user_id;
        $reseps->kota_id = $request->kota_id;
        $reseps->kategori_id = $request->kategori_id;
        $reseps->judul = $request->judul;
        // $reseps->gambar_resep = $request->gambar_resep;
        if ($request->hasFile('gambar_resep')) {
            $reseps->deleteImage(); //menghapus image sebelum di update melalui method deleteImage di model
            $image = $request->file('gambar_resep');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/gambar_resep/', $name);
            $reseps->gambar_resep = $name;
        }
        $reseps->deskripsi = $request->deskripsi;
        $reseps->bahan_bahan = $request->bahan_bahan;
        $reseps->langkah_langkah = $request->langkah_langkah;
        $reseps->save();
        return redirect()
            ->route('resep.index')->with('toast_success', 'Data has been edited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reseps = Resep::findOrFail($id);
        $users = User::all();
        $kotas = Kota::all();
        $kategoris = Kategori::all();
        return view('admin.resep.edit', compact('reseps','users','kotas','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'status' => 'required',
        ]);

        $reseps = Resep::findOrFail($id);
        $reseps->status = $request->status;
        $reseps->save();
        return redirect()
            ->route('resep.index')->with('toast_success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reseps = Resep::findOrFail($id);
        $reseps->delete();
        return redirect()
            ->route('resep.index')->with('toast_success', 'Data has been deleted');
    }
}