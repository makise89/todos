<?php
use App\Http\Controllers\TodoController;
use App\Http\Middleware\TodoMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;


//ログインの処理
Route::get('/login',[loginController::class,"loginPage"])->name('login');
Route::get('/newCreate',[loginController::class,"newCreatePage"]);
Route::post('/login',[loginController::class,"login"]);


//新規作成の処理


Route::post('/login/newCreate',[loginController::class,"loginNewcreate"]);


//ログインしているか確認の処理

Route::middleware(['auth'])->group(function (){





//noCompleteのロード処理


Route::get('/',[TodoController::class,"index"]);


//タスクの追加処理

Route::post('/task/add',[TodoController::class,"taskAdd"]);



//タスクを削除する処理

Route::post('/task/remove',[TodoController::class,"taskRemove"]);




//completeのロード処理

Route::get('/complete',[TodoController::class,"complete"]);


//タスクを復元する処理

Route::post('/task/restore',[TodoController::class,"taskRestore"]);
Route::post('/priorityOn',[TodoController::class,"priority"]);

});
