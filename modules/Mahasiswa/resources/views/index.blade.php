@extends('laravolt::layouts.app')

@section('content')


    <x-titlebar title="Mahasiswa">
        <x-item>
            <x-link label="Tambah" icon="plus" url="{{ route('modules::mahasiswa.create') }}"></x-link>
        </x-item>
    </x-titlebar>

    {!! $table !!}
@stop
