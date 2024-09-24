<?php

namespace App\Console\Commands;

use App\Actions\TicketAddAction;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportJsonTicketsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-json-tickets {file?} {event?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импортирует файл в бд';


    /**
     * Execute the console command.
     * @throws \Throwable
     */
    public function handle(): void
    {
        $file = $this->argument('file');
        $event_id = $this->argument('event');
        $event = 1;

        if ($file === null) {
            $file = $this->ask('Введите имя фала в каталоге storage/app/json ');
        }

        if ($event_id === null) {
            $event_id = $this->ask('Введите id события');
        }

        if (!Event::query()->where('id', $event_id)->exists()) {
            $this->fail('Такого события нет');
        }

        if (!Storage::disk('json')->exists($file)) {
            $this->fail('Такого файла нет');
        }

        $jsonFiles = Storage::disk('json')->json($file);

        foreach ($jsonFiles as  $item) {

            $data = collect($item)->only(['qrcode', 'area', 'row', 'seat', 'status']);
            $data = $data->toArray();

            Ticket::query()->updateOrCreate([
                'event_id' => $event_id,
                'qrcode' => $data['qrcode'],
                'area' => $data['area'],
                'row' => $data['row'],
                'seat' => $data['seat'],
                'status' => $data['status'],
            ]);
        }

    }
}
