<?php

use Modules\Dosen\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

//Route::get('modules/dosen/riwayat-pendidikan/{riwayat-pendidikan}', 'App\Http\Controllers\DeleteRiwayatController@destroyRiwayat')->name('modules::dosen.riwayat-pendidikan.destroy');

$router->group(
    [
        'prefix' => config('modules.dosen.route.prefix'),
        'as' => 'modules::',
        'middleware' => config('modules.dosen.route.middleware'),
    ],
    function ($router) {
//        $router->get('dosen/riwayat-pendidikan/{riwayat-pendidikan}', [\App\Http\Controllers\DeleteRiwayatController::class, 'destroyRiwayat'])->name('dosen.riwayat-pendidikan.destroy');
        $router->resource('dosen', DosenController::class);

    }
);
