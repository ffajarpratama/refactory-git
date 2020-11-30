@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mahasiswa.index') }}"></x-backlink>

    <x-panel title="Detil Mahasiswa">
        <table class="ui table definition">
        <tr><td>Id</td><td>{{ $mahasiswa->id }}</td></tr>
        <tr><td>Name</td><td>{{ $mahasiswa->name }}</td></tr>
        <tr><td>Nim</td><td>{{ $mahasiswa->nim }}</td></tr>
        <tr><td>Gender</td><td>{{ $mahasiswa->gender }}</td></tr>
        <tr><td>Tempat Lahir</td><td>{{ $mahasiswa->tempat_lahir }}</td></tr>
        <tr><td>Tanggal Lahir</td><td>{{ $mahasiswa->tanggal_lahir }}</td></tr>
        <tr><td>Created At</td><td>{{ $mahasiswa->created_at }}</td></tr>
        <tr><td>Updated At</td><td>{{ $mahasiswa->updated_at }}</td></tr>
        </table>
    </x-panel>

@stop
