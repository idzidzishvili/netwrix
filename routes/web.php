<?php

use App\Models\Country;
use App\Models\PartnerLocator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $partners = PartnerLocator::all();
    $statuses = PartnerLocator::select('status')->distinct()->get();
    $countries = Country::all();
    // dd($statuses);
    return view('index', ['partners' => $partners, 'statuses' => $statuses, 'countries' => $countries]);
});
