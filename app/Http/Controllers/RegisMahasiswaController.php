<?php

namespace App\Http\Controllers;

use App\Models\RegisMahasiswa;
use Illuminate\Http\Request;

class RegisMahasiswaController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate(
            [
                'nama' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:30',],
                'nim' => ['required', 'string'],
                'tgl_regis' => ['required', 'string'],
                'prodi' => ['required', 'string'],
                'semester' => ['required', 'string'],
                'bank' => ['required', 'string'],
                'keterangan' => ['required', 'string'],
                'wa' => ['required', 'string'],
                'bukti_regis' => ['required', 'mimes:pdf'],
            ],
            [
                'bukti_regis.mimes' => 'Bukti regis harus dalam format pdf !!',
            ]
        );

        if ($request->file('bukti_regis')) {
            $validate['bukti_regis'] = $request->file('bukti_regis')->store('file-registrasi-mahasiswa');
        }
        $validate['loket_id'] = $request->loket_id;
        $validate['prodi_id'] = $request->prodi;
        $validate['status'] = 0;
        RegisMahasiswa::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil dikirim.');
    }
    public function riwayat_regis()
    {
        if (request('sr')) {
            $regis = RegisMahasiswa::latest()->where('nim', 'like', '%' . request('sr') . '%')->get();
            $data = [
                'judul' => 'Riwayat Registrasi',
                'regis' => $regis,
            ];
            return view('front.riwayat_registrasi_mahasiswa', $data);
        } else {
            $data = [
                'judul' => 'Riwayat Registrasi',
                'regis' => 0,
            ];
            return view('front.riwayat_registrasi_mahasiswa', $data);
        }
        
    }
}
