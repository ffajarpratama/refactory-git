@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::dosen.index') }}"></x-backlink>

    <x-panel title="Detil Dosen">
        <table class="ui table definition">
            <tbody>
            <tr>
                <td>Nama</td>
                <td>{{ $dosen->name }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>{{ $dosen->nip }}</td>
            </tr>
            <tr>
                <td>Gelar</td>
                <td>{{ $dosen->gelar }}</td>
            </tr>
            </tbody>
        </table>
    </x-panel>

    <x-panel title="Riwayat Pendidikan">
            @foreach($riwayat as $item)
                {{ $item->strata .' '. $item->jurusan .' di '. $item->sekolah .', pada bulan '. date('F, Y', strtotime($item->tahun_selesai)) }} <br>
            @endforeach
    </x-panel>
@stop
