<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Plant') }}
        </h2>
    </x-slot>

    <div class="bg-gray-900">
        <div class="mx-auto bg-gray-900">
            <div class="bg-gray-900 overflow-hidden">
                @livewire('plant')
            </div>
        </div>
    </div>
</x-app-layout>