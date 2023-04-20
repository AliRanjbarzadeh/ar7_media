<?php

use AR7\Media\MediumController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('ar7_media.route_prefix'))->middleware((empty(config('ar7_media.middleware'))) ? [] : config('ar7_media.middleware'))->name('ar7.media.')->group(function() {
	Route::get('/', [MediumController::class, 'index'])->name('index');
	Route::post('/getDirectories', [MediumController::class, 'getDirectories'])->name('getDirectories');
	Route::post('/getFiles', [MediumController::class, 'getFiles'])->name('getFiles');
	Route::post('/newFolder', [MediumController::class, 'newFolder'])->name('newFolder');
	Route::post('/deleteItem', [MediumController::class, 'deleteItem'])->name('deleteItem');
	Route::post('/renameItem', [MediumController::class, 'renameItem'])->name('renameItem');
	Route::post('/uploadFile', [MediumController::class, 'uploadFile'])->name('uploadFile');
});

// Router
Route::get('js/ar7_media_router.js', [MediumController::class, 'ar7_media_router'])->name('ar7_media_router');
Route::get('js/ar7_media_config.js', [MediumController::class, 'ar7_media_config'])->name('ar7_media_config');
