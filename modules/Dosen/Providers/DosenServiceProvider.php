<?php

namespace Modules\Dosen\Providers;

use Illuminate\Database\Eloquent\Factory;
use Laravolt\Support\Base\BaseServiceProvider;

class DosenServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'dosen';
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
                ->add('Dosen', route('modules::dosen.index'))
                ->data('icon', 'circle outline')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/dosen/*');
        });
    }
}
