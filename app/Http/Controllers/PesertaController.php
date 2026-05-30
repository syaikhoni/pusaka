<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Peserta::where('user_id', Auth::id())->first();

        return view('peserta.biodata', compact('peserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'no_hp' => 'required',
        ]);

        Peserta::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'pendidikan' => $request->pendidikan,
                'no_hp' => $request->no_hp,
            ]
        );

        return redirect('/peserta/biodata')->with('success', 'Biodata berhasil disimpan');
    }
}