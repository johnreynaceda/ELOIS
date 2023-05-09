<?php

Route::prefix('secretary')
    ->middleware(['auth', 'secretary'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('secretary.index');
        })->name('secretary.dashboard');
        Route::get('/requests', function () {
            return view('secretary.request');
        })->name('secretary.request');
        Route::get('/appointments', function () {
            return view('secretary.appointment');
        })->name('secretary.appointment');
        Route::get('/my-calendar', function () {
            return view('secretary.calendar');
        })->name('secretary.calendar');
        Route::get('/reports', function () {
            return view('secretary.reports');
        })->name('secretary.reports');
    });
