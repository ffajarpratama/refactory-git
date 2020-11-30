<?php

namespace Modules\Mkuliah\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Mkuliah\Models\Mkuliah;

class MkuliahTableView extends TableView
{
    public function source()
    {
        return Mkuliah::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('name')->sortable(),
            Text::make('jumlah_sks')->sortable(),
            RestfulButton::make('modules::mkuliah'),
        ];
    }
}
