<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
        
                        <div class="card-body">
                            <livewire:users-table/>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </x-slot>
</x-app-layout>