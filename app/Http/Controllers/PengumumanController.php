<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengumuman::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        $data = [
            'judul' => "Pengumuman",
            'pengumuman' => $pengumuman,
        ];
        return view('admin.pengumuman.index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => "Pengumuman",
        ];
        return view('admin.pengumuman.tambah', $data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate(
            [
                'no' => ['required', 'string', 'unique:pengumumen,no'],
                'slug' => ['required', 'string', 'unique:pengumumen,slug'],
                'from' => ['required', 'string',],
                'to' => ['required', 'string'],
                'subject' => ['required', 'string'],
                'file_location' => ['required', 'mimes:pdf'],
            ],
            [
                'file_location.mimes' => 'File harus dalam format pdf.',
            ]
        );

        if ($request->file('file_location')) {
            $validate['file_location'] = $request->file('file_location')->store('file-pengumuman');
        }
        Pengumuman::create($validate);
        return redirect()->back()->with('psn', 'Data berhasil disimpan.');
        // return view('admin.pengumuman.tambah', $data);
    }
    public function detail($no)
    {
        $pengumuman = Pengumuman::where('id', $no)->first();
        // dd($pengumuman);
        $data = [
            'judul' => "Pengumuman",
            'pengumuman' => $pengumuman,
        ];
        return view('admin.pengumuman.detail', $data);
    }
    public function destroy($no)
    {
        $pengumuman = Pengumuman::where('id', $no)->first();
        // dd($pengumuman);
        Storage::delete($pengumuman->file_location);
        DB::table('pengumumen')->where('id', $no)->delete();
        return redirect()->back()->with('del_msg', 'Data berhasil dihapus.');
    }
}
