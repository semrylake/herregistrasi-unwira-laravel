<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fakultas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
    public function updateFakultas($nip, $data)
    {
        DB::table('fakultas')->where('id', $nip)->update($data);
    }
}
