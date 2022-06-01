<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Prodi;
use App\Models\RegisMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasBAAKController extends Controller
{
    public function __construct()
    {
        $this->Regis = new RegisMahasiswa();
    }

    public function dashboardPegawaiBAAK()
    {
        $regismahasiswa = count(RegisMahasiswa::where('loket_id', Auth::user()->loket->id)
            ->where('status', 0)
            ->get());
        $data = [
            "judul" => "Dashboard",
            "regismahasiswa" => $regismahasiswa,
        ];
        return view('pegawai-baak.dashboard', $data);
    }
    public function profil_pegawai()
    {
        $data = [
            "judul" => "Profil saya",
            "profile" => User::where('id', Auth::user()->id)->first(),
        ];
        return view('pegawai-baak.my_profil', $data);
    }
    public function herregistrasi_mahasiswa()
    {
        // $petugas = User::where('id', Auth::user()->id)->first();
        // $loket = Loket::where('user_id', $petugas->id)->first();
        $regismahasiswa = RegisMahasiswa::where('loket_id', Auth::user()->loket->id)
            ->where('status', 0)
            ->get();
        $data = [
            "judul" => "Herregistrasi Mahasiswa",
            "regismahasiswa" =>  $regismahasiswa,
        ];
        return view('pegawai-baak.herregistrasi_mahasiswa', $data);
    }
    public function lihat_regis_mahasiswa($id)
    {
        $dataregis = RegisMahasiswa::where('id', $id)->first();
        if (!$dataregis) {
            return abort('404');
        }
        $prodi = Prodi::where('id', $dataregis->prodi_id)->first();
        $updateData = [
            'status' => 1,
        ];
        $this->Regis->updateRegis($id, $updateData);
        $data = [
            'judul' => 'Detail Herregistrasi',
            'dataregis' => $dataregis,
            'prodi' => $prodi,
        ];
        return view('pegawai-baak.info_regis_mahasiswa', $data);
    }
    public function lihat_herregistrasi_mahasiswa($id)
    {
        $dataregis = RegisMahasiswa::where('id', $id)->first();
        if (!$dataregis) {
            return abort('404');
        }
        $prodi = Prodi::where('id', $dataregis->prodi_id)->first();

        $data = [
            'judul' => 'Detail Herregistrasi',
            'dataregis' => $dataregis,
            'prodi' => $prodi,
        ];
        return view('pegawai-baak.info_regis_mahasiswa_dilihat', $data);
    }
    public function sudah_diinput()
    {
        $regismahasiswa = RegisMahasiswa::latest()
            ->where('loket_id', Auth::user()->loket->id)
            ->where('status', 1)
            ->get();
        $data = [
            "judul" => "Herregistrasi Mahasiswa",
            "regismahasiswa" =>  $regismahasiswa,
        ];
        return view('pegawai-baak.herregistrasi_mahasiswa_dilihat', $data);
    }
}
