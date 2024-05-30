<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Site\LoginController as SiteLoginController ;
use App\Http\Controllers\Site\RegisterController  ;
use App\Http\Controllers\Site\ProfileController ;
use App\Http\Controllers\Board\UserController;
use App\Http\Controllers\Board\LoginController;
use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\AreaController;
use App\Http\Controllers\Board\RoomController;
use App\Http\Controllers\Board\RoomReservationController;
use App\Http\Controllers\Board\AdminController;

Route::get('test' , function(){


	$checkin_date = '2024-01-05';
	$checkout_date = '2024-01-07';

	$reservedCount = App\Models\ProjectReservation::where('project_id' , 17 )
	->whereDate('start_date',  '<=', $checkout_date )
	->whereDate('end_date',  '>=', $checkin_date)
	->count();

	dd($reservedCount);
});


Route::get('/', [SiteController::class , 'index' ] )->name('index');
Route::get('/rooms', [SiteController::class , 'rooms' ] )->name('rooms.index');
Route::get('/rooms/{room}', [SiteController::class , 'show' ] )->name('rooms.show');
Route::get('/login', [SiteLoginController::class , 'form' ] )->name('site.login.form');
Route::post('/login', [SiteLoginController::class , 'login' ] )->name('site.login');
Route::get('/register', [RegisterController::class , 'form' ] )->name('site.register.form');
Route::post('/register', [RegisterController::class , 'register' ] )->name('site.register');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/profile', [ProfileController::class , 'profile' ])->name('profile');
});


Route::get('Board/login' , [LoginController::class , 'form' ] )->name('board.login.form');
Route::post('Board/login' , [LoginController::class , 'login' ] )->name('board.login.post');

Route::group(['prefix' => 'Board' , 'as' => 'board.' , 'middleware' => 'admin' ], function() {
	Route::get('/' , [BoardController::class , 'index'] )->name('index'); // done
	Route::get('/logout' , [BoardController::class , 'logout'] )->name('logout'); // done
	Route::resource('admins', AdminController::class ); // done
	Route::resource('areas', AreaController::class ); // done
	Route::resource('rooms', RoomController::class );
	Route::resource('rooms.reservations', RoomReservationController::class );
	Route::get('settings/edit'  , [SettingsController::class , 'edit'] )->name('settings.edit'); // done
	Route::patch('settings'  , [SettingsController::class , 'update'] )->name('settings.update'); // done
	Route::get('terms/edit'  , [TermsController::class , 'edit'] )->name('terms.edit');
	Route::patch('terms'  , [TermsController::class , 'update'] )->name('terms.update');
	Route::get('about/edit'  , [AboutController::class , 'edit'] )->name('about.edit');
	Route::patch('about'  , [AboutController::class , 'update'] )->name('about.update');
	Route::get('/profile' , [BoardController::class , 'show_profile'] )->name('profile.show');
	Route::patch('/profile' , [BoardController::class , 'update_profile'] )->name('profile.update');
	Route::get('/password' , [BoardController::class , 'show_password'] )->name('password.show');
	Route::patch('/password' , [BoardController::class , 'update_password'] )->name('password.update');
});



















