<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    // Primary Key
    protected $primaryKey = 'id_ruang';
    public $incrementing = false;
    protected $keyType = 'string';
    // use HasFactory;

    protected $fillable = ['id_ruang', 'lokasi', 'tipe', 'kapasitas'];

    public function hasJadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class,'id_ruang', 'id_ruang');
    }
}
