<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/v1/bijoy-concert/get-ticket-holder-list', 'TicketsController@getTicketHolders');

Route::get('/v1/bijoy-concert/get-all-ticket-holder-list', 'TicketsController@getAllTicketHolders');
Route::post('/v1/bijoy-concert/get-single-ticket-info/{ticket_code}', 'TicketsController@getSingleTicketInfo');
Route::post('/v1/bijoy-concert/check-ticket-status/{ticket_code}', 'TicketsController@checkTicketStatus');
Route::patch('/v1/bijoy-concert/update-ticket-status/{ticket_code}', 'TicketsController@updateTicketStatus');
Route::patch('/v1/bijoy-concert/update-ticket-status-to-not_checked_in/{ticket_code}', 'TicketsController@updateTicketStatusToNotCheckedIn');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
