<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Auth;
use Twilio\Rest\Client;

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
        $sid    = "ACfe3a14435a41ff7d4c9493197d9e6dac"; 
        $token  = "[Redacted]"; 
        $twilio = new Client($sid, $token);
        
        $message = $twilio->messages 
                  ->create("whatsapp:+5491134214001", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Tenes cuervos en tu granja. Entra rapidamente antes que te barran el patio." 
                           ) 
                  ); 
    }
}
