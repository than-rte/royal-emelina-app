<?php

Route::get('/', function () {
    return view('pages.home.index');
});

Route::fallback(function() {
    return view('fallback');
});

Route::get('/admin/login', function() {
    return view('admin.login.index');
});

Route::get('/admin-secret={secret}', function($secret) {
    if ($secret == config('rylapp.admin_secret')) {
        return redirect('admin/login');
    } else {
        return view('fallback');
    }
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('{path?}',  function() {
        return view('admin.dashboard.index');
    })->where('path', '[\/\w\.-]*');
 });