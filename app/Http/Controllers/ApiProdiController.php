<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class ApiProdiController extends Controller
{
    public function prodi()
    {
        // $prodi = Prodi::all();
        $prodi = DB::table('prodis');
        if (request('search')) {
            // asli
            $prodi
                ->where('prodis.id', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.name', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.fakultas_id', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.kode_prodi', 'like', '%' . request('search') . '%');
        }

        return response()->json(['message' => 'success', 'data' => $prodi->get()]);
    }
    public function prodi_fakultas()
    {
        $prodi = DB::table('fakultas')
            ->join('prodis', 'fakultas.id', '=', 'prodis.fakultas_id')
            ->select(
                'prodis.id',
                'prodis.kode_prodi',
                'fakultas.nama as nama_fakultas',
                'prodis.name',
                'prodis.created_at',
                'prodis.updated_at',
            );
        if (request('search')) {
            // asli
            $prodi
                ->where('prodis.id', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.name', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.fakultas_id', 'like', '%' . request('search') . '%')
                ->orWhere('fakultas.nama', 'like', '%' . request('search') . '%')
                ->orWhere('prodis.kode_prodi', 'like', '%' . request('search') . '%');
        }
        $prodi->orderBy('fakultas.kode_fakultas');
        return response()->json(['message' => 'success', 'data' => $prodi->get()]);
    }
}
