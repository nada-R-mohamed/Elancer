<?php

use App\Http\Controllers\Client\ProjectsController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix'=> 'client',
    'as' => 'client.',
    'middleware' => ['auth'],

],function() {

    Route::resources([
        'projects'=>ProjectsController::class,
    ]);


});
