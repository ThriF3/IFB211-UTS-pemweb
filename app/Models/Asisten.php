<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    use HasFactory;

    protected $table = 'asisten';
    // Primary Key
    protected $primaryKey = 'NRP';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NRP', 
        'id_user',
        'id_praktikum',
        'nama', 
        'alamat', 
        'gender', 
        'no_telp',
        'angkatan',
        'total_sks',
        'jurusan',
        'semester',
    ];

    public function has_praktikum()
    {
        return $this->hasOne(Praktikum::class, 'id_praktikum', 'id_praktikum');
    }

    public function has_user()
    {
        return $this->hasOne(User::class, 'id_user', 'id');
    }
}
