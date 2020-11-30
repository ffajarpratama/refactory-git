	{!! form()->text('name')->label('Name') !!}
	{!! form()->text('nim')->label('Nim') !!}
	{!! form()->text('gender')->label('Gender') !!}
	{!! form()->text('tempat_lahir')->label('Tempat Lahir') !!}
	{!! form()->datepicker('tanggal_lahir')->label('Tanggal Lahir') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::mahasiswa.index'))
]) !!}
