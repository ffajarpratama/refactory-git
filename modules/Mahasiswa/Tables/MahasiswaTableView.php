<?php

namespace Modules\Mahasiswa\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\Raw;
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
            Raw::make(function ($mahasiswa) {
                $tempat = $mahasiswa->tempat_lahir;
                return $tempat . ', ' . date('d F Y', strtotime($mahasiswa->tanggal_lahir));;
            }, 'Tempat dan Tanggal Lahir'),
            Raw::make(function ($mahasiswa) {
                $sks = $mahasiswa->mata_kuliah->sum('jumlah_sks');
                $matkul = $mahasiswa->mata_kuliah->count('name');
                return $matkul . ' Mata kuliah, ' . $sks . ' SKS';
            }, 'Mata Kuliah yang Diambil'),
            Raw::make(function ($mahasiswa) {
                return "<a class='ui icon labeled button mini black basic'
                                href=' " . route('mahasiswa.mata-kuliah.edit', $mahasiswa->id) . " '>
                                <i class='eye icon'></i>
                                Mata Kuliah
                           </a>";
            }, 'Mata Kuliah'),
            RestfulButton::make('modules::mahasiswa'),
        ];
    }
}
