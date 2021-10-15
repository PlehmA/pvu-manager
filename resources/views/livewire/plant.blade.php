<div>
    <x-jet-authentication-card>
        <x-slot name="logo"></x-slot>
    <x-jet-label>
        Plant ID
    </x-jet-label>
        <x-jet-input id="plant_id" class="block mt-1 w-full" type="text" name="plant_id" :value="old('plant_id')" required autofocus>
                
        </x-jet-input>
    </x-jet-authentication-card>
</div>