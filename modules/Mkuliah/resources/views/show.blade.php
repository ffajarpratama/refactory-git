@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mkuliah.index') }}"></x-backlink>

    <x-panel title="Detil Mata kuliah">
        <table class="ui table definition">
            <tr>
                <td>Nama Mata Kuliah</td>
                <td>{{ $mkuliah->name }}</td>
            </tr>
            <tr>
                <td>Jumlah SKS</td>
                <td>{{ $mkuliah->jumlah_sks }}</td>
            </tr>
        </table>
    </x-panel>

    <x-panel title="Mahasiswa yang Mengambil Mata Kuliah Ini: {{ count($mahasiswa) . ' Mahasiswa'}}">
        {!! Suitable::source($mahasiswa)
                ->columns(['id', 'name', 'nim' ])
                ->render()
        !!}
    </x-panel>

@stop
