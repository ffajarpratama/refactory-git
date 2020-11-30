@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mkuliah.index') }}"></x-backlink>

    <x-panel title="Edit Mata kuliah">
        {!! form()->bind($mkuliah)->put(route('modules::mkuliah.update', $mkuliah->getKey()))->horizontal()->multipart() !!}
        @include('mkuliah::_form')
        {!! form()->close() !!}
    </x-panel>

@stop
