<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "kecamatans";
    protected $fillable = ["kode_kec", "nama_kecamatan", "active"];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan', 'id');
    }
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_kecamatan', 'id');
    }
}
