<?php

namespace App\Http\Controllers;

use App\Models\{Fakultas, Prodi};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->Prodi = new Prodi();
    }

    public function index()
    {
        $prodi = Prodi::all();
        $data = [
            'judul' => 'Program Studi',
            'prodi' => $prodi,
        ];
        return view('admin.prodi.index', $data);
    }

    public function tambah_prodi()
    {
        $fakultas = Fakultas::all();
        $data = [
            'judul' => 'Program Studi',
            'fakultas' => $fakultas,
        ];
        return view('admin.prodi.tambah', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'fakultas_id' => 'required',
            'kode_prodi' => 'required|max:2',
            'name' => 'required',
        ]);
        Prodi::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
    }

    public function edit_prodi($slug)
    {
        $prodi = Prodi::where('kode_prodi', $slug)->first();
        $fakultas = Fakultas::all();
        if (!$prodi) {
            return abort('404');
        }
        $data = [
            'judul' => 'Program Studi',
            'prodi' => $prodi,
            'fakultas' => $fakultas,
        ];
        return view('admin.prodi.edit', $data);
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $request->validate([
            'fakultas_id' => 'required|max:2',
            'kode_prodi' => 'required|max:2',
            'name' => 'required',
        ]);
        $prodi = Prodi::where('kode_prodi', $slug)->first();


        $data = [
            'name' => $request->name,
            'kode_prodi' => $request->kode_prodi,
            'fakultas_id' => $request->fakultas_id,
        ];
        $this->Prodi->updateProdi($prodi->id, $data);
        return redirect('/edit-prodi/' . $request->kode_prodi)->with('psn', 'Data berhasil diupdate.');
    }

    public function destroy($kode)
    {
        $prodi = Prodi::where('kode_prodi', $kode)->first();
        DB::table('prodis')->where('id', $prodi->id)->delete();
        return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
    }
}
