<?php

use App\Http\Controllers\TicketController;
use App\Http\Middleware\AccessEventMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::prefix('event/{event}')
    ->middleware(['guest', AccessEventMiddleware::class])
    ->group(function () {
        Route::controller(TicketController::class)
            ->prefix('ticket')
            ->group(function () {
                Route::get('{qrcode}/status', 'checkStatus')->name('ticket.status');
                Route::get('{ticket_id}/scan', 'scan')->name('ticket.scan');
            });
    });

require __DIR__.'/auth.php';
