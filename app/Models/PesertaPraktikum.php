<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaPraktikum extends Model
{
    use HasFactory;

    protected $table = 'peserta_praktikum';
    // Primary Key
    protected $primaryKey = 'id_peserta';
    public $incrementing = true;
    protected $keyType = 'string';

    protected $fillable = [
        'id_peserta', 
        'id_praktikum', 
        'NRP', 
    ];

    public function has_praktikum()
    {
        return $this->hasOne(MataKuliah::class, 'id_praktikum', 'id_praktikum');
    }

    public function has_mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'NRP', 'NRP');
    }
}
