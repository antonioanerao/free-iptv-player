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


/* Admin routes */
Route::group(['prefix'=>'admin'], function() {
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/', function() {
        return redirect(route('admin.dashboard'));
    });

    /* Set channels */
    Route::get('generate-json', [M3u8ToJsonController::class, 'generateJson'])->name('admin.generateJson');
    Route::get('store-channels', [M3u8ToJsonController::class, 'storeChannels'])->name('admin.storeChannels');
    Route::get('/get-epg', [M3u8ToJsonController::class, 'getEpg'])->name('admin.getepg');

});


Route::get('movies', function() {
    return \App\Models\IptvList::where('maingroup', 'movie')->get();
});
