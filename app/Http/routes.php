<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
    //return "/";
});
Route::any('/controller', function () {
    return \App\Http\Controllers\UEditorController::HandleRequest();
});
Route::get('/view/{id}', function ($id) {
    echo \App\Http\Controllers\ImageController::GetImage($id);
});
