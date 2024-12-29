<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Hash;

class Praktikum extends Model
{
    use HasFactory;

    protected $table = 'praktikum';
    // Primary Key
    protected $primaryKey = 'id_praktikum';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_praktikum', 
        'id_matkul', 
        'kelas', 
    ];

    public function has_matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id_matkul');
    }

    public function has_jadwal()
    {
        return $this->belongsTo(Jadwal::class,'id_praktikum', 'id_praktikum');
    }

    public function has_peserta()
    {
        return $this->hasMany(PesertaPraktikum::class,'id_praktikum', 'id_praktikum');
    }

    public function has_posting()
    {
        return $this->hasMany(Postingan::class,'id_praktikum', 'id_praktikum');
    }
}
