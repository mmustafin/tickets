<?php

namespace App\Actions;

use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class TicketScanAction
{
    use AsAction;

    public function handle($event, $qrcode): array
    {
        $ticket = Ticket::query()->ticket($event, $qrcode)->first();

        if ($ticket->status !== "valid") {
            return [
                'errors' => [
                    'status' => 422,
                    'message' => 'Не верный статус билета',
                    'ticket' => $ticket
                ]
            ];
        }

        $ticket->status = "used";

        $ticket->save();

        return [
            'ticket' => $ticket,
        ];
    }
}
