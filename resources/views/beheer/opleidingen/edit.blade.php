<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opleiding bewerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-small-top')

        <form method="post" action="{{ route('opleidingen.update', $opleiding['crebo_nr']) }}" class="mt-10">

            @csrf
            @method('put')

            <div class="mt-4">
                <div class="form-group">
                    <label for="crebo_nr" class="block font-medium text-sm text-gray-700">Crebo nummer</label>
                    <input id="crebo_nr" class="block mt-1 w-full form-control" type="number" name="crebo_nr" value="{{ $opleiding['crebo_nr'] }}"/>
                    @livewire('includes.validation.input', ['input' => 'crebo_nr'])
                </div>

                <div class="form-group">
                    <label for="opleiding" class="block font-medium text-sm text-gray-700">Opleiding naam</label>
                    <input id="opleiding" class="block mt-1 w-full form-control" type="text" name="opleiding" value="{{ $opleiding['opleiding'] }}"/>
                    @livewire('includes.validation.input', ['input' => 'opleiding'])
                </div>

                <div class="mt-4">
                    <a href="{{ route('opleidingen.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                        <i class="fas fa-backward mr-2"></i> Terug
                    </a>
                    
                    <div class="form-group">
                        <x-jet-button class="button" style="float: right">
                            Opslaan <i class="fas fa-forward ml-2"></i> 
                        </x-jet-button>
                    </div>
                </div>
            </div>
                
        </form>
    
    @livewire('includes.content.bottom.content-bottom')  

</x-app-layout>