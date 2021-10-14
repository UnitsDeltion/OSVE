<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

        <div class="containter mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('f6') }}">
                        @csrf
                            <h3>Overige informatie</h3>
                             
                            <div class="mb-3">
                                <x-jet-label for="faciliteitenpas" value="{{ __('Faciliteitenpas') }}" />
                                @error('Faciliteitenpas')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <x-jet-input id="faciliteitenpas" class="block mt-1 w-full" type="text" name="faciliteitenpas" :value="old('faciliteitenpas')" autofocus />
                            </div>

                            <div class="mb-3">
                                <x-jet-label for="bijzonderheden" value="{{ __('Bijzonderheden') }}" />
                                @error('bijzonderheden')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <x-jet-input id="bijzonderheden" class="block mt-1 w-full" type="text" name="bijzonderheden" :value="old('bijzonderheden')"/>
                            </div>

                            <div class="mb-3">
                                <x-jet-label for="opmerking" value="{{ __('Opmerking') }}" />
                                @error('opmerking')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <x-jet-input id="studentnopmerkingummer" class="block mt-1 w-full" type="text" name="opmerking" :value="old('opmerking')"/>
                            </div>

                        <div class="mt-4">
                            <a href="{{ route('p4') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                                <i class="fas fa-backward mr-2"></i> Terug
                            </a>
                            
                            <div class="form-group">
                                <x-jet-button class="button" style="float: right">
                                    Verder <i class="fas fa-forward ml-2"></i> 
                                </x-jet-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
