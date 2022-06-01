<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function updateProdi($id, $data)
    {
        DB::table('prodis')->where('id', $id)->update($data);
    }


    public function layananBaak()
    {
        return $this->hasMany(ProdiLayananBAAK::class);
    }
    public function loket()
    {
        return $this->hasOne(Loket::class);
    }

    public function regisMahasiswa()
    {
        return $this->hasMany(RegisMahasiswa::class);
    }
}
