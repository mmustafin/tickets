<?php

namespace App\Actions;

use App\Models\Ticket;
use Lorisleiva\Actions\Concerns\AsAction;

class TicketCheckStatusAction
{
    use AsAction;

    public function handle($event, $qrcode): array
    {
        $ticket = Ticket::query()->ticket($event, $qrcode)->first();

        if (!$ticket) {
            return [
                'errors' => [
                    'status' => 404,
                    'message' => 'Билет не найден'
                ]
            ];
        }

        return ['data' => $ticket];
    }
}
