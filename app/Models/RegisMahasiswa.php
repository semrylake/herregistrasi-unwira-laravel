<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisMahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function loket()
    {
        return $this->belongsTo(Loket::class, 'loket_id');
    }

    public function programStudi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function updateRegis($nip, $data)
    {
        DB::table('regis_mahasiswas')->where('id', $nip)->update($data);
    }
}
