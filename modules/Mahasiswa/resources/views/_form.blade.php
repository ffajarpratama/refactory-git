{!! form()->text('name')->label('Name') !!}
{!! form()->text('nim')->label('Nim') !!}
{!! form()->radioGroup('gender', ['male' => 'Male', 'female' => 'Female'])->label('Gender') !!}
{!! form()->text('tempat_lahir')->label('Tempat Lahir') !!}
{!! form()->datepicker('tanggal_lahir')->label('Tanggal Lahir') !!}
{!! form()->action([
    form()->submit('Simpan'),
    form()->link('Batal', route('modules::mahasiswa.index'))
]) !!}
