<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Dosen\Models\Dosen;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendidikan';

    protected $guarded = [];

    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
