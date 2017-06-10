<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('member')->user();

    //dd($users);
    $Member=\app\Member::find(Auth::guard('member')->user()->id);
    return view('member.home')->with(compact('Member'));
})->name('home');

