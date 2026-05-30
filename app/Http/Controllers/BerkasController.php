<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::where('user_id', Auth::id())->get();

        return view('peserta.berkas', compact('berkas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_berkas' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('berkas', 'public');

        Berkas::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'jenis_berkas' => $request->jenis_berkas,
            ],
            [
                'file' => $path,
                'status' => 'Pending',
                'catatan' => null,
            ]
        );

        return redirect('/berkas')->with('success', 'Berkas berhasil diupload');
    }

    public function adminIndex()
{
    $berkas = Berkas::with('user')->latest()->get();

    return view('admin.berkas.index', compact('berkas'));
}

public function verifikasi(Request $request, $id)
{
    $request->validate([
        'status' => 'required',
        'catatan' => 'nullable',
    ]);

    $berkas = Berkas::findOrFail($id);
    $berkas->status = $request->status;
    $berkas->catatan = $request->catatan;
    $berkas->save();

    return back()->with('success', 'Status berkas berhasil diperbarui');
}
}