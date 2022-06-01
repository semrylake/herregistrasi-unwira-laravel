<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
    public function regis_mahasiswa()
    {
        return $this->hasMany(RegisMahasiswa::class);
    }

    public function updateLoket($id, $data)
    {
        DB::table('lokets')->where('id', $id)->update($data);
    }
}
