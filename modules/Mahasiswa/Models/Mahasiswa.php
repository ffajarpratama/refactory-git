<?php

namespace Modules\Mahasiswa\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;
use Modules\Mkuliah\Models\Mkuliah;

class Mahasiswa extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'mahasiswa';

    protected $guarded = [];

    protected $searchableColumns = ["name", "nim", "gender", "tempat_lahir", "tanggal_lahir",];

    public function mata_kuliah()
    {
        return $this->belongsToMany(Mkuliah::class, 'mahasiswa_mkuliah', 'mahasiswa_id', 'mkuliah_id');
    }
}
