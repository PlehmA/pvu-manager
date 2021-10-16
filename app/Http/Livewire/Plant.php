<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Auth;
use Twilio\Rest\Client;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class Plant extends Component
{
    public $plantid;
    public $data;

    public function render()
    {
        return view('livewire.plant');
    }

    public function show()
    {
        $response = Http::withToken(Auth::user()->bearer_token)
        ->get('https://backend-farm.plantvsundead.com/get-plant-detail-v2?plantId='.$this->plantid);

        $this->data = $response->collect();
    }

    public function notification()
    {
        Mail::to(Auth::user()->email)
        ->send(new Notification());
    }
}
