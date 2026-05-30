<?php

namespace App\Http\Controllers;

use App\Models\Formasi;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function create()
    {
        $formasis = Formasi::all();

        return view('public.daftar-online', compact('formasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_naskah' => 'required',
            'kategori_naskah' => 'required',
            'abstrak' => 'required',
            'instansi' => 'required',

            'jenis_pendaftar' => 'required',
            'formasi_id' => 'nullable',

            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'nullable|email',

            'ktp' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'file_pendukung' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);

        $nomor = 'PSK-' . date('Y') . '-' . str_pad(Pendaftar::count() + 1, 5, '0', STR_PAD_LEFT);

        $data = $request->except([
            'ktp',
            'ijazah',
            'pas_foto',
            'file_pendukung'
        ]);

        $data['nomor_pendaftaran'] = $nomor;
        $data['status_verifikasi'] = 'Menunggu Verifikasi';
        $data['status_seleksi'] = 'Menunggu Review';

        if ($request->hasFile('ktp')) {
            $data['ktp'] = $request->file('ktp')->store('pendaftar/ktp', 'public');
        }

        if ($request->hasFile('ijazah')) {
            $data['ijazah'] = $request->file('ijazah')->store('pendaftar/ijazah', 'public');
        }

        if ($request->hasFile('pas_foto')) {
            $data['pas_foto'] = $request->file('pas_foto')->store('pendaftar/pas_foto', 'public');
        }

        if ($request->hasFile('file_pendukung')) {
            $data['file_pendukung'] = $request->file('file_pendukung')->store('pendaftar/naskah', 'public');
        }

        $pendaftar = Pendaftar::create($data);

        return redirect('/daftar-online/sukses/' . $pendaftar->nomor_pendaftaran);
    }

    public function sukses($nomor)
    {
        $pendaftar = Pendaftar::where('nomor_pendaftaran', $nomor)->firstOrFail();

        return view('public.sukses', compact('pendaftar'));
    }

    public function cekStatus()
    {
        return view('public.cek-status');
    }

    public function hasilStatus(Request $request)
    {
        $request->validate([
            'nomor_pendaftaran' => 'required',
        ]);

        $pendaftar = Pendaftar::where('nomor_pendaftaran', $request->nomor_pendaftaran)->first();

        return view('public.hasil-status', compact('pendaftar'));
    }

    public function adminIndex()
    {
        $pendaftars = Pendaftar::latest()->get();

        return view('admin.pendaftar.index', compact('pendaftars'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required',
            'status_seleksi' => 'required',
            'catatan' => 'nullable',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);

        $pendaftar->status_verifikasi = $request->status_verifikasi;
        $pendaftar->status_seleksi = $request->status_seleksi;
        $pendaftar->catatan = $request->catatan;

        $pendaftar->save();

        return back()->with('success', 'Status pendaftar berhasil diperbarui');
    }

    public function publikasi()
    {
        $publikasi = Pendaftar::where('status_seleksi', 'Dipublikasikan')
            ->latest()
            ->get();

        return view('public.publikasi', compact('publikasi'));
    }

    public function detailPublikasi($nomor)
    {
        $artikel = Pendaftar::where('nomor_pendaftaran', $nomor)
            ->where('status_seleksi', 'Dipublikasikan')
            ->firstOrFail();

        return view('public.detail-publikasi', compact('artikel'));
    }
}