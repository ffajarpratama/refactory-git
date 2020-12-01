<?php

namespace Modules\Dosen\Tables;

use Laravolt\Suitable\Columns\Numbering;
use Laravolt\Suitable\Columns\Raw;
use Laravolt\Suitable\Columns\RestfulButton;
use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;
use Modules\Dosen\Models\Dosen;

class DosenTableView extends TableView
{
    protected $title = 'Data Dosen';

    public function source()
    {
        return Dosen::autoSort()->latest()->autoSearch(request('search'))->paginate();
    }

    protected function columns()
    {
        return [
            Numbering::make('No'),
            Text::make('name', 'Nama')->sortable(),
            Text::make('nip', 'NIP')->sortable(),
            Text::make('gelar', 'Gelar')->sortable(),
            Raw::make(function ($dosen) {
                $riwayat = count($dosen->riwayat_pendidikan);
                $result = array();
                for ($i = 0; $i < $riwayat; $i++) {
                    $result[] = $dosen->riwayat_pendidikan[$i]->strata . ' ' . $dosen->riwayat_pendidikan[$i]->jurusan;
                }
                return implode(", ", $result);
            }, 'Riwayat Pendidikan'),
            Raw::make(function ($dosen) {
                $sks = $dosen->mata_kuliah->sum('jumlah_sks');
                $matkul = $dosen->mata_kuliah->count('name');
                return $matkul . ' Mata kuliah, ' . $sks . ' SKS';
            }, 'Mata Kuliah yang Diampu'),
            Raw::make(function ($dosen) {
                return "<a class='ui icon labeled button mini black basic'
                                href=' " .route('mata-kuliah.show', $dosen->id). " '>
                                <i class='eye icon'></i>
                                Mata Kuliah
                           </a>";
            }, 'Mata Kuliah'),
            RestfulButton::make('modules::dosen', 'Action'),
        ];
    }
}
