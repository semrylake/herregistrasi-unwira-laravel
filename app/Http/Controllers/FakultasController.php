<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    public function __construct()
    {
        $this->Fakultas = new Fakultas();
    }
    public function index()
    {
        $fakultas = Fakultas::all();
        $data = [
            'fakultas' => $fakultas,
            'judul' => 'Fakultas',
        ];
        return view('admin.fakultas.index', $data);
    }
    public function tambah_fakultas()
    {
        $data = [
            'judul' => 'Fakultas',
        ];
        return view('admin.fakultas.tambah', $data);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_fakultas' => 'required|unique:fakultas,kode_fakultas|max:2',
            'nama' => 'required',
        ]);
        Fakultas::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }
    public function edit_fakultas($kode)
    {
        $fakultas = Fakultas::where('kode_fakultas', $kode)->first();
        if (!$fakultas) {
            return abort('404');
        }
        $data = [
            'judul' => 'Fakultas',
            'fakultas' => $fakultas,
        ];
        return view('admin.fakultas.edit', $data);
    }
    public function update(Request $request, $kode)
    {
        $request->validate([
            'kode_fakultas' => 'required|max:2',
            'nama' => 'required',
        ]);
        
        $fakultas = Fakultas::where('kode_fakultas', $kode)->first();
        if ($request->kode_fakultas != $fakultas->kode_fakultas) {
            $request->validate([
                'kode_fakultas' => 'unique:fakultas,kode_fakultas',
            ]);
        }

        $data = [
            'nama' => $request->nama,
            'kode_fakultas' => $request->kode_fakultas,
        ];
        $this->Fakultas->updateFakultas($fakultas->id, $data);
        return redirect('/edit-fakultas/' . $request->kode_fakultas)->with('psn', 'Data berhasil diupdate.');
    }
    public function destroy($kode)
    {
        $fakultas = Fakultas::where('kode_fakultas', $kode)->first();
        DB::table('fakultas')->where('id', $fakultas->id)->delete();
        return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
    }
}
