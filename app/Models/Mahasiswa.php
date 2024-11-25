<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    // Primary Key
    protected $primaryKey = 'NRP';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NRP', 
        'nama', 
        'alamat', 
        'gender', 
        'no_telp',
        'angkatan',
        'total_sks',
        'jurusan',
        'semester',
    ];
}
