<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Laravel\Fortify\Fortify;

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

Fortify::routes();
// 入力フォーム
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact', [ContactController::class, 'index']);

// 確認画面（POST）
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 送信処理（POST）
Route::post('/send', [ContactController::class, 'send'])->name('contact.send');

// サンクス画面（GET）
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


Route::get('/admin',[ContactController::class,'admin'])->name('admin.index');

//モーダル
Route::delete('/admin/delete/{id}', [ContactController::class, 'destroy'])->name('admin.delete');

//ログイン
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//レジスター
Route::get('/register', [RegisterController::class, 'show'])->name('register'); // フォーム表示
Route::post('/register', [RegisterController::class, 'store']); // 登録処理
