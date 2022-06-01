<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiFakultasController extends Controller
{

    public function fakultas()
    {
        // $fakultas = Fakultas::all();
        $fakultas = DB::table('fakultas');
        if (request('search')) {
            // asli
            $fakultas
                ->where('fakultas.id', 'like', '%' . request('search') . '%')
                ->orWhere('fakultas.nama', 'like', '%' . request('search') . '%')
                ->orWhere('fakultas.kode_fakultas', 'like', '%' . request('search') . '%');
        }
        return response()->json(['data' => $fakultas->get()]);
    }
}
