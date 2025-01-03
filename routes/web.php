<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',function(){
    return redirect()->route('chat');
});
Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('chat');
    })->name('chat');
    
    Route::post('send_message',[ChatController::class,'send_message'])->name('send_message');
});
Auth::routes();
