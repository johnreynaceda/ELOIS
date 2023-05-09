<?php

Route::prefix('client')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('client.index');
        })->name('client.dashboard');
        Route::get('/profile', function () {
            return view('client.profile');
        })->name('client.profile');
         Route::get('/request/notarize-document', function () {
         return view('client.notarize-document');
         })->name('client.notarize-document');
    });
