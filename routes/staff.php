<?php

Route::prefix('staff')
    ->middleware(['auth', 'staff'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('staff.index');
        })->name('staff.dashboard');
        Route::get('/clients', function () {
            return view('staff.client');
        })->name('staff.client');
        Route::get('/manage-client/{id}', function () {
            return view('staff.manage-client');
        })->name('staff.manage-client');
        Route::get('/requests', function () {
            return view('staff.request');
        })->name('staff.request');
        Route::get('/documents', function () {
            return view('staff.document');
        })->name('staff.document');
        Route::get('/reports', function () {
            return view('staff.reports');
        })->name('staff.reports');
         Route::get('/deed-of-sale', function () {
         return view('staff.deed-of-sale');
         })->name('staff.deed-of-sale');
    });
