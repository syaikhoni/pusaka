<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HasilSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilSeleksiController extends Controller
{
    public function adminIndex()
    {
        $users = User::where('role', 'peserta')->get();
        $hasil = HasilSeleksi::with('user')->latest()->get();

        return view('admin.hasil.index', compact('users', 'hasil'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nilai' => 'nullable',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        HasilSeleksi::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'nilai' => $request->nilai,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]
        );

        return back()->with('success', 'Hasil seleksi berhasil disimpan');
    }

    public function pesertaIndex()
    {
        $hasil = HasilSeleksi::where('user_id', Auth::id())->first();

        return view('peserta.hasil', compact('hasil'));
    }
}