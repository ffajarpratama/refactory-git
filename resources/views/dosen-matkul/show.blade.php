@extends('laravolt::layouts.app')
@section('content')

    <x-backlink url="{{ route('modules::dosen.index') }}"></x-backlink>

    <x-panel title="Dosen">
        <table class="ui table definition">
            <tbody>
            <tr>
                <td>Nama</td>
                <td>{{ $dosen->name }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>{{ $dosen->nip }}</td>
            </tr>
            <tr>
                <td>Gelar</td>
                <td>{{ $dosen->gelar }}</td>
            </tr>
            </tbody>
        </table>
    </x-panel>

    <x-panel title="Mata Kuliah yang Diampu">
        {!! form()->bind($dosen)->open()->put()->action(route('mata-kuliah.update', $dosen->id)) !!}

        @foreach($matkul as $item)
            <label>
                <input type="checkbox" class="ui checkbox p-b-2" name="matkul[]" value="{{ $item->id }}"
                    {{ $dosen->mata_kuliah->contains($item->id)  ? 'checked' : ''  }}>
                <strong>{{ $item->name }}</strong>{{ ' - ' . $item->jumlah_sks . ' SKS' }}
            </label>
            <br>
        @endforeach
        <br>
        Jumlah SKS dari mata kuliah yang diampu: {{ $sks }}

        <div class="ui divider hidden"></div>

        {!!
            form()->action([
                form()->submit('Save'),
                form()->link('Kembali', route('modules::dosen.index'))
            ])
        !!}
        {!! form()->close() !!}
    </x-panel>
@stop
