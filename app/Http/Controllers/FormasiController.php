<?php

namespace App\Http\Controllers;

use App\Models\Formasi;
use Illuminate\Http\Request;

class FormasiController extends Controller
{
    public function index()
    {
        $formasis = Formasi::latest()->get();
        return view('admin.formasi.index', compact('formasis'));
    }

    public function create()
    {
        return view('admin.formasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_formasi' => 'required',
            'kuota' => 'required|integer',
            'lokasi' => 'nullable',
            'syarat' => 'nullable',
        ]);

        Formasi::create($request->all());

        return redirect('/admin/formasi')->with('success', 'Formasi berhasil ditambahkan');
    }

    public function edit(Formasi $formasi)
    {
        return view('admin.formasi.edit', compact('formasi'));
    }

    public function update(Request $request, Formasi $formasi)
    {
        $request->validate([
            'nama_formasi' => 'required',
            'kuota' => 'required|integer',
            'lokasi' => 'nullable',
            'syarat' => 'nullable',
        ]);

        $formasi->update($request->all());

        return redirect('/admin/formasi')->with('success', 'Formasi berhasil diperbarui');
    }

    public function destroy(Formasi $formasi)
    {
        $formasi->delete();

        return redirect('/admin/formasi')->with('success', 'Formasi berhasil dihapus');
    }
}