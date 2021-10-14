<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

        <div class="containter">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form method="POST" action="{{ route('f7') }}">
                        @csrf
                            <h3>Overzicht</h3>
                             
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-jet-label for="voornaam" value="{{ __('Voornaam') }}" />
                                        <x-jet-input id="voornaam" class="block mt-1 w-full disabled" type="text" name="voornaam" value="{{ $voornaam }}" disabled />
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="achternaam" value="{{ __('Achternaam') }}" />
                                        <x-jet-input id="achternaam" class="block mt-1 w-full disabled" type="text" name="achternaam" value="{{ $achternaam }}" disabled />
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="studentnummer" value="{{ __('Studentnummer') }}" />
                                        <x-jet-input id="studentnummer" class="block mt-1 w-full disabled" type="text" name="studentnummer" value="{{ $studentnummer }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <x-jet-label for="opleiding" value="{{ __('Opleiding') }}" />
                                <x-jet-input id="opleiding" class="block mt-1 w-full disabled" type="text" name="opleiding" value="{{ $opleiding }}" disabled />
                            </div>
                             
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label for="vak" value="{{ __('Vak') }}" />
                                        <x-jet-input id="vak" class="block mt-1 w-full disabled" type="text" name="vak" value="{{ $vak }}" disabled />
                                    </div>
                                    <div class="col-md-6">
                                        <x-jet-label for="examen" value="{{ __('Examen') }}" />
                                        <x-jet-input id="examen" class="block mt-1 w-full disabled" type="text" name="examen" value="{{ $examen }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-jet-label for="datum" value="{{ __('Datum') }}" />
                                        <x-jet-input id="datum" class="block mt-1 w-full disabled" type="text" name="datum" value="{{ $datum }}" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="tijd" value="{{ __('Tijd') }}" />
                                        <x-jet-input id="tijd" class="block mt-1 w-full disabled" type="text" name="tijd" value="{{ $tijd }}" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="faciliteitenpas" value="{{ __('Faciliteitenpas') }}" />
                                        <x-jet-input id="faciliteitenpas" class="block mt-1 w-full disabled" type="text" name="faciliteitenpas" value="{{ $faciliteitenpas }}" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div >
                                <x-jet-label for="opmerkingen" value="{{ __('Opmerkingen') }}" />
                                <textarea name="opmerkingen" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full disabled" id="opmerkingen" rows="5" disabled>{{ $opmerkingen }}</textarea>
                            </div>

                            <p><small>Met het versturen ga ik akkoord met de <a class="fc-primary" href="regelementen">regelementen</a> van de examinering.</small></p>

                            <div class="mt-4">
                                <a href="{{ route('p5') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                                    <i class="fas fa-backward mr-2"></i> Terug
                                </a>
                                
                                <div class="form-group">
                                    <x-jet-button class="button" style="float: right">
                                        Verzenden <i class="fas fa-forward ml-2"></i> 
                                    </x-jet-button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
