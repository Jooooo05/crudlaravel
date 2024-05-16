<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = "kelurahan";
    protected $fillable = ["kode_kel", "nama_kelurahan", "id_kecamatan", "active"];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_kelurahan', 'id');
    }

}
