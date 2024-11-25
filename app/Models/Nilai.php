<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    // Primary Key
    protected $primaryKey = 'id_nilai';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_nilai', 
        'id_praktikum', 
        'NRP', 
        'predikat', 
        'nilai', 
    ];

    public function has_praktikum()
    {
        return $this->hasOne(Praktikum::class, 'id_praktikum', 'id_praktikum');
    }

    public function has_mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'NRP', 'NRP');
    }
}
