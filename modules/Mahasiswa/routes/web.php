<?php

use Modules\Mahasiswa\Controllers\MahasiswaController;

$router->group(
    [
        'prefix' => config('modules.mahasiswa.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.mahasiswa.route.middleware'),
    ],
    function ($router) {
        $router->resource('mahasiswa', MahasiswaController::class);
    }
);
