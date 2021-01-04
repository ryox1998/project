<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentCRUDController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HotelCRUDController;
use App\Http\Controllers\ShopCRUDController;
use App\Http\Controllers\AmpherController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LoginController;
/*
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/','App\Http\Controllers\ContentCRUDController@index');
Route::resource('contents', ContentCRUDController::class);
Route::resource('guide', GuideController::class);
Route::resource('hotels', HotelCRUDController::class);
Route::resource('shops', ShopCRUDController::class);
Route::get('ampher/mueang_tak','App\Http\Controllers\AmpherController@mueang_tak');
Route::get('ampher/ban_tak','App\Http\Controllers\AmpherController@ban_tak');
Route::get('ampher/sam_ngao','App\Http\Controllers\AmpherController@sam_ngao');
Route::get('ampher/measot','App\Http\Controllers\AmpherController@measot');
Route::get('ampher/mae_ramat','App\Http\Controllers\AmpherController@mae_ramat');
Route::get('ampher/tha_song_yang','App\Http\Controllers\AmpherController@tha_song_yang');
Route::get('ampher/phop_phra','App\Http\Controllers\AmpherController@phop_phra');
Route::get('ampher/um_phang','App\Http\Controllers\AmpherController@um_phang');
Route::get('ampher/wang_chao','App\Http\Controllers\AmpherController@wang_chao');
Route::get('ampher/showall','App\Http\Controllers\AmpherController@showall');
Route::get('admin/config','App\Http\Controllers\AmpherController@dashbord');
