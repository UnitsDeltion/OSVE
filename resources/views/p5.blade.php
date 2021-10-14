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
                <div class="col-md-9">
                    <form method="POST" action="{{ route('f6') }}">
                        @csrf
                            <h3>Overige informatie</h3>
                             
                            <div class="mb-3">
                                <x-jet-label for="faciliteitenpas" value="{{ __('Faciliteitenpas') }}" />
                                @error('Faciliteitenpas')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <select name="faciliteitenpas" id="faciliteitenpas" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Nee" selected>Nee</option>
                                    <option value="Ja">Ja</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <x-jet-label for="opmerkingen" value="{{ __('Opmerkingen') }}" />
                                @error('opmerkingen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <textarea name="opmerkingen" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="opmerkingen" rows="5" :value="old('opmerkingen')"></textarea>
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
