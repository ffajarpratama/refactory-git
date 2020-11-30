@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Mata kuliah">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::mkuliah.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
