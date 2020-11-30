@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mkuliah.index') }}"></x-backlink>

    <x-panel title="Detil Mata kuliah">
        <table class="ui table definition">
        <tr><td>Id</td><td>{{ $mkuliah->id }}</td></tr>
        <tr><td>Name</td><td>{{ $mkuliah->name }}</td></tr>
        <tr><td>Jumlah Sks</td><td>{{ $mkuliah->jumlah_sks }}</td></tr>
        <tr><td>Created At</td><td>{{ $mkuliah->created_at }}</td></tr>
        <tr><td>Updated At</td><td>{{ $mkuliah->updated_at }}</td></tr>
        </table>
    </x-panel>

@stop
