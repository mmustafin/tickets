<?php

namespace App\Actions;

/**
 * @method static \Lorisleiva\Actions\Decorators\JobDecorator|\Lorisleiva\Actions\Decorators\UniqueJobDecorator makeJob(mixed $event, mixed $qrcode)
 * @method static \Lorisleiva\Actions\Decorators\UniqueJobDecorator makeUniqueJob(mixed $event, mixed $qrcode)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch dispatch(mixed $event, mixed $qrcode)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchIf(bool $boolean, mixed $event, mixed $qrcode)
 * @method static \Illuminate\Foundation\Bus\PendingDispatch|\Illuminate\Support\Fluent dispatchUnless(bool $boolean, mixed $event, mixed $qrcode)
 * @method static dispatchSync(mixed $event, mixed $qrcode)
 * @method static dispatchNow(mixed $event, mixed $qrcode)
 * @method static dispatchAfterResponse(mixed $event, mixed $qrcode)
 * @method static \Illuminate\Http\JsonResponse run(mixed $event, mixed $qrcode)
 */
class TicketScanAction
{
}
namespace Lorisleiva\Actions\Concerns;

/**
 * @method void asController()
 */
trait AsController
{
}
/**
 * @method void asListener()
 */
trait AsListener
{
}
/**
 * @method void asJob()
 */
trait AsJob
{
}
/**
 * @method void asCommand(\Illuminate\Console\Command $command)
 */
trait AsCommand
{
}