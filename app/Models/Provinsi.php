<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = "provinsi";
    protected $fillable = ["kode", "nama_provinsi", "active"];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_provinsi', 'id');
    }
}
