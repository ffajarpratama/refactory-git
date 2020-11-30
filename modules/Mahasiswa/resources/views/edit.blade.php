@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mahasiswa.index') }}"></x-backlink>

    <x-panel title="Edit Mahasiswa">
        {!! form()->bind($mahasiswa)->put(route('modules::mahasiswa.update', $mahasiswa->getKey()))->horizontal()->multipart() !!}
        @include('mahasiswa::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
