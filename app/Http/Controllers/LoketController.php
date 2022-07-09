<?php

namespace App\Http\Controllers;

use App\Models\{Loket, Prodi, ProdiLayananBAAK, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoketController extends Controller
{
    public function __construct()
    {
        $this->Loket = new Loket();
    }
    public function index()
    {
        $loket = Loket::all()->sortBy('no_loket');

        $data = [
            'judul' => 'Loket',
            'loket' => $loket,
        ];
        return view('admin.loket.index', $data);
    }
    public function tambah_loket()
    {
        $petugas = User::all()->where('level', 'pegawai');
        $data = [
            'judul' => 'Loket',
            'petugas' => $petugas,
        ];
        return view('admin.loket.tambah', $data);
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $pegawai = DB::table('users')->where('level', 'pegawai')->where('nip', $request->user_id)->first();
        $validate = $request->validate([
            'no_loket' => 'required|unique:lokets,no_loket|max:2',
            'user_id' => 'required',
        ]);
        $validate['user_id'] = $pegawai->id;
        $validate['tlpn'] = $request->tlpn;
        Loket::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }
    public function edit($slug)
    {
        $loket = Loket::where('no_loket', $slug)->first();
        if (!$loket) {
            return abort('404');
        }
        $petugas = User::all()->where('level', 'pegawai');
        $data = [
            'judul' => 'Loket',
            'petugas' => $petugas,
            'loket' => $loket,
        ];
        return view('admin.loket.edit', $data);
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'no_loket' => 'required|max:2',
            'user_id' => 'required',
        ]);
        $loket = Loket::where('no_loket', $slug)->first();
        if ($request->no_loket != $loket->no_loket) {
            $request->validate([
                'no_loket' => 'unique:lokets,no_loket|max:2',
            ]);
        }
        $pegawai = DB::table('users')->where('level', 'pegawai')->where('nip', $request->user_id)->first();
        $data = [
            'no_loket' => $request->no_loket,
            'user_id' => $pegawai->id,
            'tlpn' => $request->tlpn,
        ];
        $this->Loket->updateLoket($loket->id, $data);
        return redirect('/edit-loket/' . $request->no_loket)->with('psn', 'Data berhasil diupdate.');
    }
    public function destroy($id)
    {
        DB::table('lokets')->where('id', $id)->delete();
        return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
    }
    public function info($no)
    {
        $loket = Loket::where('no_loket', $no)->first();
        if (!$loket) {
            abort('404');
        }
        $prodi = Prodi::all()->sortBy('name');
        $prodiLayanan = ProdiLayananBAAK::all()->where('loket_id', $loket->id);
        // dd($prodiLayanan);
        $data = [
            'judul' => 'Loket',
            'loket' => $loket,
            'prodi' => $prodi,
            'prodiLayanan' => $prodiLayanan,
        ];
        return view('admin.loket.info', $data);
    }
    public function storeProdiLayanan(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'no_loket' => 'required',
            'prodi_id' => 'required',
            'nip' => 'required',
        ]);
        $loket = Loket::where('no_loket', $request->no_loket)->first();
        // $prodi = Prodi::where('kode_prodi', $request->prodi_id)->first();
        $user = User::where('nip', $request->nip)->first();
        $validate['loket_id'] = $loket->id;
        $validate['prodi_id'] = $request->prodi_id;
        $validate['user_id'] = $user->id;
        ProdiLayananBAAK::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }
    public function destroyPelayanProdiBaak($id)
    {
        DB::table('prodi_layanan_b_a_a_k_s')->where('id', $id)->delete();
        return redirect()->back()->with('psn', 'Data berhasil dihapus.');
    }
}
