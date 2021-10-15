<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-900">
            <div class="bg-gray-900 overflow-hidden">
                <x-jet-welcome :plants=$plants/>
            </div>
        </div>
    </div>
</x-app-layout>
