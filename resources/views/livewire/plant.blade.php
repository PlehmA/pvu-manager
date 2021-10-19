<div>

    @if(blank($data) === null)

    <div class="rounded overflow-hidden shadow-lg justify-center bg-gray-800 w-60 m-auto">
        <img src="{{ $data['data']['plant']['iconUrl'] }}" class="max-h-40 m-auto" alt="">
        
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-center border text-gray-500">{{ ucwords($data['data']['plant']['stats']['type']) }}</div>
            <p class="text-gray-500 text-base border text-center">
                LE:{{ $data['data']['plant']['farmConfig']['le'] }}/{{ $data['data']['plant']['farmConfig']['hours'] }} Hours
                
            </p>
            <p class="text-gray-500 text-base border text-center">
                
                {{$data['data']['plant']['farmConfig']['le']/$data['data']['plant']['farmConfig']['hours']}} each hour
            </p>
          </div>
    </div>
    @endif
    @if (session()->has('message'))
    <div class="bg-red-500 border border-black text-white px-4 py-3 rounded relative mt-3 text-center max-w-md mx-auto" role="alert">
        <strong class="font-bold"> {{ session('message') }} </strong>
        <span class="block sm:inline"></span>
      </div>
    @endif
    <div class="rounded overflow-hidden shadow-lg justify-center bg-gray-800 w-1/2 m-auto p-20 mt-3">
    <x-jet-label>
        Plant ID
    </x-jet-label>
        <x-jet-input id="plant_id" wire:model="plantid" class="block mt-1 w-full" type="search" name="plant_id" autofocus>
                
        </x-jet-input>
        
        <x-jet-button type="submit" wire:click="show" class="mt-3">
            Search
        </x-jet-button>
        {{-- <x-jet-button type="submit" wire:click="notification" class="mt-3">
            Notification
        </x-jet-button> --}}
    </div>
</div>