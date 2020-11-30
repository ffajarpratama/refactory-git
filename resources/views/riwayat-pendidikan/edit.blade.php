@extends('laravolt::layouts.app')
@section('content')
    <x-backlink url="{{ route('modules::dosen.edit', $riwayatPendidikan->dosen->id) }}"></x-backlink>

    <x-panel title="Edit Riwayat Pendidikan Milik {{ $riwayatPendidikan->dosen->name }}">
        {!! form()->bind($riwayatPendidikan)->put(route('riwayat-pendidikan.update', $riwayatPendidikan->getKey()))->horizontal()!!}
        {!! form()->text('strata', $riwayatPendidikan->strata)->label('Strata') !!}
        {!! form()->text('jurusan', $riwayatPendidikan->jurusan)->label('Jurusan') !!}
        {!! form()->text('sekolah', $riwayatPendidikan->sekolah)->label('Sekolah') !!}

        {!! form()->datepicker('tahun_mulai', $riwayatPendidikan->tahun_mulai)->label('Tahun Mulai') !!}
        {!! form()->datepicker('tahun_selesai', $riwayatPendidikan->tahun_selesai)->label('Tahun Selesai') !!}

        {!!
            form()->action([
                form()->submit('Save'),
                form()->link('Kembali', route('modules::dosen.edit', $riwayatPendidikan->dosen->id))
            ])
        !!}
        {!! form()->close() !!}
    </x-panel>
@endsection

