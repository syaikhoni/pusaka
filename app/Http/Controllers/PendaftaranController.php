<?php

namespace App\Http\Controllers;

use App\Models\Formasi;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $formasis = Formasi::all();

        return view('peserta.formasi', compact('formasis'));
    }

    public function daftar($id)
    {
        $cek = Pendaftaran::where('user_id', Auth::id())
            ->where('formasi_id', $id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Anda sudah mendaftar formasi ini');
        }

        Pendaftaran::create([
            'user_id' => Auth::id(),
            'formasi_id' => $id,
            'status' => 'Pending'
        ]);

        return back()->with('success', 'Pendaftaran berhasil');
    }
}