<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IptvListController;
use App\Http\Controllers\M3u8ToJsonController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/livetv/groups', [IptvListController::class, 'liveTvGroups'])->name('livetv.groups');
Route::get('/groups/channels/{tvgroup}', [IptvListController::class, 'groupChannels'])->name('groups.channels');

Route::get('/movies/groups', [IptvListController::class, 'moviesGroups'])->name('movies.groups');
Route::get('groups/movies/{tvgroup}', [IptvListController::class, 'moviesGroupsList'])->name('movies.groups.list');

Route::get('/series/groups', [IptvListController::class, 'seriesGroups'])->name('series.groups');
Route::get('groups/series/{tvgroup}', [IptvListController::class, 'seriesGroupsList'])->name('series.groups.list');

Route::get('/player/{id}', [PlayerController::class, 'player'])->name('player');
Route::get('/player2/{id}', [PlayerController::class, 'player2'])->name('player2');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'], function() {
    Route::get('/users/create', [UsersController::class, 'create'])
        ->name('admin.users.create');

    Route::post('/users/create/store', [UsersController::class, 'store'])
        ->name('admin.users.store');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/users/edit/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::patch('/users/edit/{id}/updatePassword', [UsersController::class, 'updatePassword'])->name('admin.users.updatePassword');

    //Generate json from m3u file
    Route::get('generate-json', [M3u8ToJsonController::class, 'generateJson'])->name('admin.generateJson');

    //store live/movies/series to database from json
    Route::get('store-channels', [M3u8ToJsonController::class, 'storeChannels'])->name('admin.storeChannels');

    //Get EPG Info
    Route::get('/get-epg', [M3u8ToJsonController::class, 'getEpg'])->name('admin.getepg');
});
