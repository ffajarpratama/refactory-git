@extends('laravolt::layouts.app')

@section('content')

    <x-backlink url="{{ route('modules::dosen.index') }}"></x-backlink>


    <x-panel title="Edit Dosen">
        <div class="ui equal width form">
            <form action="{{ route('modules::dosen.update', $dosen->id) }}" method="post">
                @csrf
                @method('PUT')

                {!! form()->text('name', $dosen->name)->label('Nama') !!}
                {!! form()->text('nip', $dosen->nip)->label('NIP') !!}
                {!! form()->text('gelar', $dosen->gelar)->label('Gelar') !!}

                @include('dosen::edit-form')
                @include('dosen::_form')
            </form>
        </div>
    </x-panel>

    <x-panel title="Riwayat Pendidikan">
        <table class="ui celled table" id="user_table" aria-describedby="Edit Riwayat">
            <thead>
            <tr>
                <th id="strata">Strata</th>
                <th id="jurusan">Jurusan</th>
                <th id="sekolah">Sekolah</th>
                <th id="tahun_mulai">Tahun Mulai</th>
                <th id="tahun_selesai">Tahun Selesai</th>
                <th id="" class="center aligned">Action</th>
            </tr>
            </thead>
            @foreach($riwayat as $item)
                <tr>
                    <td>
                        {{ $item->strata }}
                    </td>
                    <td>
                        {{ $item->jurusan }}
                    </td>
                    <td>
                        {{ $item->sekolah }}
                    </td>
                    <td>
                        {{ date('d F Y', strtotime($item->tahun_mulai))  }}
                    </td>
                    <td>
                        {{ date('d F Y', strtotime($item->tahun_selesai))  }}
                    </td>
                    <td class="center aligned">
                        <div class="ui icon buttons black">
                            <a href="{{ route('riwayat-pendidikan.edit', $item->id) }}"
                               class="ui button mini">
                                <i class="pencil icon"></i>
                            </a>

                            <form action="{{ route('riwayat-pendidikan.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete" class="ui button tiny">
                                    <i class="trash icon"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </x-panel>
@stop
