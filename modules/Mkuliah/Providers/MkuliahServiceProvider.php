<?php

namespace Modules\Mkuliah\Providers;

use Illuminate\Database\Eloquent\Factory;
use Laravolt\Support\Base\BaseServiceProvider;

class MkuliahServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'mkuliah';
    }

    public function register()
    {
        $file = $this->packagePath("config/{$this->getIdentifier()}.php");
        $this->mergeConfigFrom($file, "modules.{$this->getIdentifier()}");
        $this->publishes([$file => config_path("modules/{$this->getIdentifier()}.php")], 'config');

        $this->config = collect(config("modules.{$this->getIdentifier()}"));
    }

    protected function menu()
    {
        app('laravolt.menu.sidebar')->register(function ($menu) {
            $menu->modules
                ->add('Mata Kuliah', route('modules::mkuliah.index'))
                ->data('icon', 'book')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/mkuliah/*');
        });
    }
}
