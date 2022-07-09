<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Pengumuman;
use App\Models\ProdiLayananBAAK;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class IndexController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function loket_baak()
    {
        $loket = Loket::all()->sortBy('no_loket');
        $prodi = ProdiLayananBAAK::all();
        // dd($prodi);
        $data = [
            "judul" => "Loket BAAK",
            "loket" => $loket,
            "prodi" => $prodi,
        ];
        return view('front.loketBaak', $data);
    }

    public function regis_semester($loket)
    {
        $loket = Loket::where('no_loket', $loket)->first();
        if (!$loket) {
            return abort('404');
        }
        $prodiLayananBaak = ProdiLayananBAAK::all()->where('loket_id', $loket->id);
        $data = [
            "judul" => "Formulir Registrasi",
            "prodi" => $prodiLayananBaak,
            "loket" => $loket,
        ];
        return view('front.formRegistrasi', $data);
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::latest()->get();
        // $p =
        $data = [
            "judul" => "Pengumuman",
            "pengumuman" => $pengumuman,
        ];
        return view('front.pengumuman', $data);
    }
    public function lihat_pengumuman($no)
    {
        $pengumuman = Pengumuman::where('id', $no)->first();
        if (!$pengumuman) {
            return abort('404');
        }
        $data = [
            "judul" => "Pengumuman",
            "pengumuman" => $pengumuman,
        ];
        return view('front.detail-pengumuman', $data);
    }
}
