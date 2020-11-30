<?php

namespace Modules\Mahasiswa\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Support\Traits\AutoFilter;
use Laravolt\Support\Traits\AutoSearch;
use Laravolt\Support\Traits\AutoSort;

class Mahasiswa extends Model
{
    use AutoSearch, AutoSort, AutoFilter;

    protected $table = 'mahasiswa';

    protected $guarded = [];

    protected $searchableColumns = ["name", "nim", "gender", "tempat_lahir", "tanggal_lahir",];
}
