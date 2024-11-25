<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    // Primary Key
    protected $primaryKey = 'id_jadwal';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_jadwal', 
        'id_praktikum', 
        'id_ruang', 
        'hari', 
        'waktu', 
    ];

    public function has_praktikum()
    {
        return $this->hasOne(Praktikum::class, 'id_praktikum', 'id_praktikum');
    }

    public function has_ruang()
    {
        return $this->hasOne(Jadwal::class, 'id_ruang', 'id_ruang');
    }
}
