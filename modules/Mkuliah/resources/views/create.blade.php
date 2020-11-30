@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mkuliah.index') }}"></x-backlink>

    <x-panel title="Tambah Mata kuliah">
        {!! form()->post(route('modules::mkuliah.store'))->horizontal()->multipart() !!}
        @include('mkuliah::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
