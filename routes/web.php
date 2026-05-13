<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController; // 猫日記ページのルートを追加

Route::get('/', function () {
    return view('welcome');
});

// 猫日記ページのルートを追加
Route::get('/diaries', [DiaryController::class, 'index']);
Route::post('/diaries', [DiaryController::class, 'store'])->name('diaries.store');

// 新規投稿のルートを追加
Route::get('/diaries/create', [DiaryController::class, 'create']);

// 猫日記ページの編集ルートを追加
Route::get('/diaries/{id}/edit', [DiaryController::class, 'edit'])->name('diaries.edit');
Route::put('/diaries/{id}', [DiaryController::class, 'update'])->name('diaries.update');

// 猫日記ページの削除ルートを追加
Route::delete('/diaries/{id}', [DiaryController::class, 'destroy'])->name('diaries.destroy');

// 日記ごとのページ遷移ルートを追加
Route::get('/diaries/{id}', [DiaryController::class, 'show'])->name('diaries.show');

// 日記に登録した体重をグラフで表示するルートを追加
Route::get('/graph', [DiaryController::class, 'graph']);