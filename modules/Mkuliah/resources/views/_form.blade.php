	{!! form()->text('name')->label('Name') !!}
	{!! form()->text('jumlah_sks')->label('Jumlah Sks') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::mkuliah.index'))
]) !!}
