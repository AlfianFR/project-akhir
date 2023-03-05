<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Berhasil', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $katgeori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Berhasil', 'Data berhasil diedit')->autoClose(2000);
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')
        ->with('success', 'Data berhasil dihapus!');
    }
}