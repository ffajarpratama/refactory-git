<?php

use Modules\Mkuliah\Controllers\MkuliahController;

$router->group(
    [
        'prefix' => config('modules.mkuliah.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.mkuliah.route.middleware'),
    ],
    function ($router) {
        $router->resource('mkuliah', MkuliahController::class);
    }
);
