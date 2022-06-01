<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;

class ApiPengumumanController extends Controller
{
    public function pengumuman()
    {
        // $pengumuman = DB::table('pengumumen')
        $pengumuman = Pengumuman::latest()
            ->select(
                'pengumumen.no',
                'pengumumen.from',
                'pengumumen.to',
                'pengumumen.slug',
                'pengumumen.subject',
                'pengumumen.file_location',
            )
            // ->orderBy('pengumumen.id', 'desc')
            ->get();
        return response()->json(['message' => 'success', 'data' => $pengumuman]);
    }

    public function detail($data)
    {
        $pengumuman = DB::table('pengumumen')
            ->select(
                'pengumumen.no',
                'pengumumen.from',
                'pengumumen.to',
                'pengumumen.slug',
                'pengumumen.subject',
                'pengumumen.file_location',
            )

            ->where('slug', $data)
            // ->orderBy('pengumumen.id', 'desc')
            ->get();
        return response()->json(['message' => 'success', 'data' => $pengumuman]);
    }
}
