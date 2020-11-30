@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mahasiswa.index') }}"></x-backlink>

    <x-panel title="Tambah Mahasiswa">
        {!! form()->post(route('modules::mahasiswa.store'))->horizontal()->multipart() !!}
        @include('mahasiswa::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
