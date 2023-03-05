<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Kota;
use Illuminate\Http\Request;
use Validator;

class KotaController extends Controller
{
    public function index()
    {
        $kota = Kota::all();
        return view('admin.kota.index', compact('kota'));
    }

    public function create()
    {
        return view('admin.kota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kota' => 'required',
        ]);

        $kota = new Kota();
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        Alert::success('Berhasil', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('kota.index');
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show', compact('kota'));
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kota' => 'required',
        ]);

        $kota = Kota::findOrFail($id);
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        Alert::success('Berhasil', 'Data berhasil diedit')->autoClose(2000);
        return redirect()->route('kota.index');
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')
        ->with('success', 'Data berhasil dihapus!');
    }
}