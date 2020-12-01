<?php

namespace Modules\Mkuliah\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Mkuliah\Models\Mkuliah;

class MkuliahTableView extends TableView
{
    protected $title = 'Data Mata Kuliah';

    public function source()
    {
        return Mkuliah::autoSort()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('name')->sortable(),
            Text::make('jumlah_sks')->sortable(),
            Raw::make(function ($matkul) {
                if (count($matkul->mahasiswa) == 0) {
                    return 'Belum ada yang mengambil';
                } else {
                    return count($matkul->mahasiswa) . ' Mahasiswa';
                }
            }, 'Jumlah Mahasiswa')->sortable(),
            RestfulButton::make('modules::mkuliah'),
        ];
    }
}
