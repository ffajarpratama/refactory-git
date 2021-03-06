@extends(config('laravolt.epicentrum.view.layout'))

@section('content')

    <x-titlebar title="{{ __('laravolt::label.permissions') }}"></x-titlebar>

    <x-panel title="Atur Deskripsi Hak Akses">
        <div class="ui icon message compact">
            <i class="lightbulb outline icon"></i>
            <div class="content">
                <div class="header">
                    Tips
                </div>
                <p>
                    Memberikan deskripsi yang jelas akan membantu admin aplikasi ketika melakukan pengaturan hak akses.
                    <br>
                    Contoh: <strong>laravolt::manage-user</strong> bisa diperjelas deskripsinya menjadi <strong>Menambah, mengedit, dan menghapus pengguna</strong>.
                </p>
            </div>
        </div>
        {!! form()->open(route('epicentrum::permissions.update'))->put() !!}

        {!! Suitable::source($permissions)->columns([
            \Laravolt\Suitable\Columns\Numbering::make('No')->setHeaderAttributes(['width' => '50px']),
            \Laravolt\Suitable\Columns\Text::make('name', __('laravolt::permissions.name'))
                ->setHeaderAttributes(['width' => '250px']),
            \Laravolt\Suitable\Columns\Raw::make(function($item) {
                return SemanticForm::textarea('permission['.$item->getKey().']')->value($item->description)->rows(2);
            }, __('laravolt::permissions.description'))
        ])->render() !!}

        <div class="p-y-1">
            {!! form()->submit(__('laravolt::action.save')) !!}
        </div>
        {!! form()->close() !!}

    </x-panel>

@endsection
