<?php

namespace App\QueryBuilders;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;

class TicketQueryBuilder extends Builder
{
    public function ticket($event, $qrcode): TicketQueryBuilder
    {

        return $this->where([
                'qrcode' => $qrcode,
                'event_id' => $event,
            ])
            ->limit(1);
    }
}
