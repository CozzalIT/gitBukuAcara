<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

include 'mod_route/dashboard.php';
include 'mod_route/atlete.php';
include 'mod_route/record.php';
include 'mod_route/event.php';
include 'mod_route/report.php';

