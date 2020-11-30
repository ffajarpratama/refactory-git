@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::dosen.index') }}"></x-backlink>

    <x-panel title="Tambah Dosen">

        <div class="ui form">
            <form method="post" action="{{ route('modules::dosen.store') }}">
                @csrf

                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="field">
                    <label>NIP</label>
                    <input type="text" name="nip" placeholder="NIP">
                </div>
                <div class="field">
                    <label>Gelar</label>
                    <input type="text" name="gelar" placeholder="Gelar">
                </div>

                @include('dosen::edit-form')
                <input type="submit" class="ui button" value="Save">
            </form>
        </div>
    </x-panel>
@endsection
