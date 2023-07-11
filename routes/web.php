<?php

use App\Http\Controllers\Autentification\RegisterController;
use App\Http\Controllers\Autentification\AuthController;
use App\Http\Controllers\LkClientController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\ServiseController;
use App\Http\Controllers\AdminController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// НАЧАЛЬНАЯ СТРАНИЦА
Route::view('/', 'autentification')->name('autentification');

// РЕГИСТРАЦИЯ
Route::get('/registration', [RegisterController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

// АУТЕНТИФФИКАЦИЯ
Route::get('/auth', [AuthController::class, 'index'])->middleware('guest')->name('auth.index');
Route::post('/auth', [AuthController::class, 'store'])->middleware('guest')->name('auth.store');

// ЗАВЕРШЕНИЕ СЕССИИ
Route::post('/logout', [AuthController::class, 'delete'])->middleware('auth')->name('auth.delete');

// ЛИЧНЫЙ КАБИНЕТ
Route::get('/lk', [LkClientController::class, 'index'])->middleware('auth')->name('client.index');
Route::post('/lk', [LkClientController::class, 'store'])->middleware('auth')->name('client.store');
Route::get('/lk/{car_sts}', [LkClientController::class, 'delete'])->name('client.delete');
Route::get('/lk/update/view', [LkClientController::class, 'lkUpdateView'])->name('client.lkUpdateView');
Route::post('/lk/update/upd', [LkClientController::class, 'lkUpdateUpd'])->name('client.lkUpdateUpd');

// ПОИСК
Route::get('/search', [SearchController::class, 'index'])->middleware('auth')->name('search.index');

// ЗАЯВКИ КЛИЕНТА
Route::get('/bid', [BidController::class, 'index'])->middleware('auth')->name('bid.index');

// СТРАНИЦА АВТОСЕРВИСА
Route::get('/servise/{carservise_id}', [ServiseController::class, 'index'])->name('servise.index');
Route::post('/servise/{carservise_id}/create', [ServiseController::class, 'addBid'])->middleware('auth')->name('servise.addBid');
Route::get('/servise/{carservise_id}/update-info', [DispatcherController::class, 'updateServiseInfo'])->middleware('auth')->name('servise.updateServiseInfo');
Route::post('/servise/{carservise_id}/update-info', [DispatcherController::class, 'updateServiseInfoUpd'])->middleware('auth')->name('servise.updateServiseInfoUpd');
Route::get('servise/{carservise_id}/update-servises', [DispatcherController::class, 'updateServiseServises'])->middleware('auth')->name('servise.updateServiseServises');
Route::post('servise/{carservise_id}/update-servises', [DispatcherController::class, 'addServiseServises'])->middleware('auth')->name('servise.addServiseServises');
Route::get('servise/{carservise_id}/delete-servises', [DispatcherController::class, 'deleteServiseServises'])->middleware('auth')->name('servise.deleteServiseServises');
Route::get('dispatcher/{bid_id}/delete-bid', [DispatcherController::class, 'deleteBid'])->middleware('auth')->name('dispatcher.deleteBid');

Route::get('/dispatcher', [DispatcherController::class, 'index'])->name('dispatcher.index');
Route::post('/dispatcher/updateOne/{bid_id}', [DispatcherController::class, 'updateStatusOne'])->name('dispatcher.updateStatusOne');
Route::post('/dispatcher/updateTwo/{bid_id}', [DispatcherController::class, 'updateStatusTwo'])->name('dispatcher.updateStatusTwo');
Route::post('/dispatcher/updateThree/{bid_id}', [DispatcherController::class, 'updateStatusThree'])->name('dispatcher.updateStatusThree');

Route::get('/admin', [AdminController::class, 'userView'])->middleware('auth')->name('admin.userView');
Route::post('/admin/user/add', [AdminController::class, 'userAdd'])->middleware('auth')->name('admin.userAdd');
Route::get('/admin/user/{user_id}', [AdminController::class, 'userDelete'])->middleware('auth')->name('admin.userDelete');
Route::get('/admin/servise', [AdminController::class, 'serviseView'])->middleware('auth')->name('admin.serviseView');
Route::post('/admin/servise/add', [AdminController::class, 'serviseAdd'])->middleware('auth')->name('admin.serviseAdd');
Route::get('/admin/servise/{carservise_id}', [AdminController::class, 'serviseDelete'])->middleware('auth')->name('admin.serviseDelete');

Route::post('/servise/{carservise_id}', [ServiseController::class, 'addComment'])->middleware('auth')->name('servise.addComment');

Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview');
Route::get('pdf/generate', [PDFController::class, 'generatePDF'])->name('pdf.generate');