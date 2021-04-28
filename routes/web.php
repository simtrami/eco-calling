<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localizationRedirect'],
], function () {
    Route::get('', [FrontendController::class, 'home'])->name('home');
    Route::get('/signatures', [FrontendController::class, 'signatures'])->name('signatures');
    Route::post('', [FrontendController::class, 'sign'])->name('sign');

    /*
     * Handles the email verification to confirm a signature
     */
    Route::get('/signatures/{id}/verify/{hash}', [FrontendController::class, 'verify'])
        ->where([
            'id' => '[0-9]+',
            'hash' => '[a-fA-F0-9]+',
        ])->middleware('signed')
        ->name('signatures.verify');
});
