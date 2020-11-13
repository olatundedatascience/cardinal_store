<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShareholderController;
use App\Http\Controllers\Shares;
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

Route::get('/', [AuthController::class, 'index']);



Route::prefix('home')->group(function(){
    Route::get('/admin', [Home::class, 'index'])->name('admin_home');
    Route::get('/user', [Home::class, 'userhome'])->name('user_home');
    Route::get('/logout', [Home::class, 'Logout'])->name('logout');
});

Route::middleware(['mustLogin', 'isAdmin'])->group(function(){
    Route::prefix('positions')->group(function(){
        Route::get('/create', [PositionController::class, 'CreateOpenPosition'])->name('create_position');
        Route::post('/create/new', [PositionController::class, 'CreateNewPosition'])->name('position_create');
        Route::get('/all',[PositionController::class, 'ListAllPositions'])->name('position_all');
        Route::get('/selectCandidateForPosition/{id}',[PositionController::class, 'SelectCandidateForPosition'])->name('add_candidate');
        Route::get('/selectEligibleVoters/{id}',[PositionController::class, 'SelectEligibleVoters'])->name('select_voters');
        Route::post('/PostSelectEligibleVoters',[PositionController::class, 'PostSelectEligibleVoters'])->name('post_select_voters');
        Route::post('/PostSelectCandidateForPosition',[PositionController::class, 'PostSelectCandidateForPosition'])->name('post_add_candidate');
        Route::get('/open_position/{id}', [PositionController::class, 'OpenPosition'])->name('open_position');
        Route::get('/close_position/{id}', [PositionController::class, 'ClosePosition'])->name('close_position');
        
    });
    Route::prefix('sharefolder')->group(function(){
        Route::get('/create', [ShareholderController::class, 'create'])->name('shareholder_create');
        Route::post('/create/new', [ShareholderController::class, 'CreateNewShareHolder'])->name('shareholder_create_post');
        Route::get('/all', [ShareholderController::class, 'ShareHolderList'])->name('shareholder_all');
        Route::delete('/delete/{id}', [ShareholderController::class, 'Home@index'])->name('shareholder_delete');
    });
    Route::prefix('shares')->group(function(){
        Route::get('/create', [Shares::class, 'CreateShare'])->name('create_share');
        Route::post('/create/new', [Shares::class, 'PostCreateNewShare'])->name('new_share');
        Route::get('/share_list',[Shares::class, 'SharesList'])->name('shaes_list');
        Route::delete('/share_delete',[Shares::class, 'SharesList'])->name('share_delete');
    });
});
Route::get('/notallowed', function(){
    return view('notallowed');
})->name('not_allowed');

Route::middleware(['mustLogin'])->group(function(){
    Route::post('/castvote', [Home::class, 'CastVote'])->name('cast_vote');
});
Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'PostIndex'])->name('post_login');
});


