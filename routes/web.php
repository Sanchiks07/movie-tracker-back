<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/entries', [EntryController::class, 'index']);
Route::get('/entries/create', [EntryController::class, 'create']);
Route::get('/entries/search', [EntryController::class, 'search']);
Route::get('/entries/{entry}', [EntryController::class, 'show'])->name('entries.show');
Route::post('/entries', [EntryController::class, 'store']);
Route::get('/entries/{entry}/edit', [EntryController::class, 'edit']);
Route::put('/entries/{entry}', [EntryController::class, 'update']);
Route::delete('/entries/{entry}', [EntryController::class, 'destroy']);