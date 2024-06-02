<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
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

// お問い合わせフォームの入力画面の表示
Route::get('/', [ContactController::class, 'contact']);
// contactから送られてきたデータをconfirmで表示
Route::post('/confirm', [ContactController::class, 'confirm']);
// confirmから送られてきたデータを保存し、thanksページを表示
Route::post('/thanks', [ContactController::class, 'thanks']);

// ページ作成、確認用ルート
Route::get('/admin', [AdminController::class, 'admin']);
//ログイン済みの場合のみ管理画面にアクセス可能
// Route::middleware('auth')->group(function () {
//     Route::get('/admin', [adminController::class, 'admin']);
// });
//お問い合わせ検索
Route::post('/find', [AdminController::class, 'search']);

//管理画面のログアウト先の指定
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

