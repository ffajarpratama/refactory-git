<?php

namespace Modules\Dosen\Models;

use App\Models\RiwayatPendidikan;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;
use Modules\Mkuliah\Models\Mkuliah;

class Dosen extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'dosen';

    protected $guarded = [];

    protected $searchableColumns = ["name", "nip", "gelar",];

    public function riwayat_pendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'dosen_id');
    }

    public function mata_kuliah()
    {
        return $this->belongsToMany(Mkuliah::class, 'dosen_mkuliah', 'dosen_id', 'mkuliah_id');
    }
}
