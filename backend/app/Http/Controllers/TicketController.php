<?php

namespace App\Http\Controllers;

use App\Actions\TicketCheckStatusAction;
use App\Actions\TicketScanAction;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class TicketController extends Controller
{
    use AsAction;

    public function checkStatus($event, $qrcode): JsonResponse
    {
        return response()->json([
            'data' => TicketCheckStatusAction::run($event, $qrcode),
        ]);
    }
    public function scan($event, $qrcode): JsonResponse
    {
        return response()->json(TicketScanAction::run($event, $qrcode));
    }
}
