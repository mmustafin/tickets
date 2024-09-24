<?php

namespace App\Models;

use App\QueryBuilders\TicketQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static Ticket|TicketQueryBuilder query()
 */
class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'qrcode',
        'area',
        'row',
        'seat',
        'status',
        'event_id',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function newEloquentBuilder($query): TicketQueryBuilder
    {
        return new TicketQueryBuilder($query);
    }
}
