<?php

use App\Events\MyEvent;
use App\Events\TypingEvent;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
    event(new MyEvent('Sunil Yadav','Hello World'));
});

Route::post('send-message',function(Request $request){
    event(new MyEvent($request['name'],$request['message']));
    return true;
})->name('send.message');

Route::post('typing',function(Request $request){
    event(new TypingEvent($request['name']));
    return true;
})->name('who.typing');