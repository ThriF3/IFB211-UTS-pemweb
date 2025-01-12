<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $table = 'postingan';
    // Primary Key
    protected $primaryKey = 'id_post';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_praktikum',
        'judul', 
        'tipe', 
        'description', 
        'startDate', 
        'endDate', 
        'file_content',
    ];

    protected $casts = [
        'startDate' => 'date',
        'endDate' => 'date',
    ];

    public function has_praktikum()
    {
        return $this->hasOne(MataKuliah::class, 'id_praktikum', 'id_praktikum');
    }

    public function has_nilai()
    {
        return $this->hasMany(Nilai::class,'id_post', 'id_post');
    }
}
