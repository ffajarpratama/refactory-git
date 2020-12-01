<?php

namespace Modules\Mkuliah\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;
use Modules\Dosen\Models\Dosen;
use Modules\Mahasiswa\Models\Mahasiswa;

class Mkuliah extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'mkuliah';

    protected $guarded = [];

    protected $searchableColumns = ["name", "jumlah_sks",];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_mkuliah', 'mkuliah_id', 'dosen_id');
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_mkuliah', 'mkuliah_id', 'mahasiswa_id');
    }
}
