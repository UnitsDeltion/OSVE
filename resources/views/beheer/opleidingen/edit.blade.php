<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opleiding bewerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-wide-top') 

        <a href="{{ route('opleidingen.index') }}" class="a-clear mb-2">
            <x-jet-button class="dd-primary mb-2">
                {{ __('Terug naar opleidingen beheer') }}
            </x-jet-button>
        </a>

        <form method="post" action="{{ route('opleidingen.update', $opleiding['crebo_nr']) }}">
            @csrf
            @method('put')

            <div class="row">
                <!--Gebruiker gegevens -->
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="crebo_nr" class="block font-medium text-sm text-gray-700">Crebo nummer</lable>
                        @error('crebo_nr')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="crebo_nr" class="block mt-1 w-full form-control" type="number" name="crebo_nr" value="{{ $opleiding['crebo_nr'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opleiding" class="block font-medium text-sm text-gray-700">Opleiding naam</lable>
                        @error('opleiding')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="opleiding" class="block mt-1 w-full form-control" type="text" name="opleiding" value="{{ $opleiding['opleiding'] }}"/>
                    </div>
                </div>  

                

                <div class="form-group">
                    <x-jet-button class="dd-primary mb-2">
                        {{ __('Opslaan') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    
    @livewire('includes.content.bottom.content-bottom')  

</x-app-layout>