<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class SendNotificationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisa si hay cuervos y manda notificaciones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('bearer_token', '!=', null)->get();

        foreach ($user as $us) {
            $response = Http::withToken($us->bearer_token)
            ->get('https://backend-farm.plantvsundead.com/farms?limit=10&offset=0');
            $res = $response->collect();
            
            if(blank($res)){
                $this->info('Usuario '.$us->name.' no trajo nada');
            }else{
                $cuervos = 0;

                foreach ($res['data'] as $value) {
                    if ($value['stage'] != 'farming') {
                        $cuervos++;
                    }
                }

                if ($cuervos >= 1) {
                    Mail::to($us->email)
                        ->send(new Notification());
                }
                $this->info('La cuenta de '.$us->name.', tenía '. $cuervos. ' cuervos.');
            }
            
        }
        return 'Proceso finalizado exitosamente';
    }
}
