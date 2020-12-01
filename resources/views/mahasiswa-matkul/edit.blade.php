@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::mahasiswa.index') }}"></x-backlink>

    <x-panel title="Mahasiswa">
        <table class="ui table definition">
            <tr>
                <td>Name</td>
                <td>{{ $mahasiswa->name }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>{{ $mahasiswa->nim }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ ucfirst($mahasiswa->gender) }}</td>
            </tr>
            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td>{{ $mahasiswa->tempat_lahir . ', ' . date('d F Y', strtotime($mahasiswa->tanggal_lahir)) }}</td>
            </tr>
        </table>
    </x-panel>

    <x-panel title="Mata Kuliah yang Diambil">
        {!! form()->bind($mahasiswa)->put(route('mahasiswa.mata-kuliah.update', $mahasiswa->id))!!}

        @foreach($matkul as $item)
            <label>
                <input type="checkbox" class="ui checkbox p-b-2" name="matkul[]" value="{{ $item->id }}"
                    {{ $mahasiswa->mata_kuliah->contains($item->id)  ? 'checked' : ''  }}>
                <strong>{{ $item->name }}</strong>{{ ' - ' . $item->jumlah_sks . ' SKS' }}
            </label>
            <br>
        @endforeach
        <br>
        Jumlah SKS dari mata kuliah yang diambil: {{ $sks }}

        <div class="ui divider hidden"></div>

        {!!
            form()->action([
                form()->submit('Save'),
                form()->link('Kembali', route('modules::mahasiswa.index'))
            ])
        !!}
        {!! form()->close() !!}
    </x-panel>

@stop
