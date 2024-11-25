<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    // Primary Key
    protected $primaryKey = 'id_matkul';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_matkul', 'semester', 'fakultas', 'nama', 'sks'];

    public function hasPraktikum(): HasMany
    {
        return $this->hasMany(Praktikum::class,'id_praktikum', 'id_praktikum');
    }
}
