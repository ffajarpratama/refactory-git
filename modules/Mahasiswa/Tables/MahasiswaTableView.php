<?php

namespace Modules\Mahasiswa\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Mahasiswa\Models\Mahasiswa;

class MahasiswaTableView extends TableView
{
    public function source()
    {
        return Mahasiswa::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('name')->sortable(),
            Text::make('nim')->sortable(),
            Text::make('gender')->sortable(),
            Text::make('tempat_lahir')->sortable(),
            Text::make('tanggal_lahir')->sortable(),
            RestfulButton::make('modules::mahasiswa'),
        ];
    }
}
