<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  
    
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })    
    </script>

        <div class="containter">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form method="POST" action="{{ route('f6') }}">
                        @csrf
                            <h3>Overzicht</h3>
                            
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-jet-label for="voornaam" value="{{ __('Voornaam') }}" />
                                        <x-jet-input id="voornaam" class="block mt-1 w-full disabled" type="text" name="voornaam" value="{{ $data['voornaam'] }}" disabled />
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="achternaam" value="{{ __('Achternaam') }}" />
                                        <x-jet-input id="achternaam" class="block mt-1 w-full disabled" type="text" name="achternaam" value="{{ $data['achternaam'] }}" disabled />
                                    </div>
                                    <div class="col-md-4">
                                        <x-jet-label for="faciliteitenpas" value="{{ __('Faciliteitenpas') }}" />
                                        <x-jet-input id="faciliteitenpas" class="block mt-1 w-full disabled" type="text" name="faciliteitenpas" value="{{ $data['faciliteitenpas'] }}" disabled/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label for="studentnummer" value="{{ __('Studentnummer') }}" />
                                        <x-jet-input id="studentnummer" class="block mt-1 w-full disabled" type="text" name="studentnummer" value="{{ $data['studentnummer'] }}" disabled />
                                    </div>
                                    <div class="col-md-6">
                                        <x-jet-label for="klas" value="{{ __('Klas') }}" />
                                        <x-jet-input id="klas" class="block mt-1 w-full disabled" type="text" name="klas" value="{{ $data['klas'] }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <x-jet-label for="opleiding" value="{{ __('Opleiding') }}" />
                                <x-jet-input id="opleiding" class="block mt-1 w-full disabled" type="text" name="opleiding" value="{{ $data['opleiding'] }}" disabled />
                            </div>
                             
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label for="vak" value="{{ __('Vak') }}" />
                                        <x-jet-input id="vak" class="block mt-1 w-full disabled" type="text" name="vak" value="{{ $data['vak'] }}" disabled />
                                    </div>
                                    <div class="col-md-6">
                                        <x-jet-label for="examen" value="{{ __('Examen') }}" />
                                        <x-jet-input id="examen" class="block mt-1 w-full disabled" type="text" name="examen" value="{{ $data['examen'] }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label for="datum" value="{{ __('Datum') }}" />
                                        <x-jet-input id="datum" class="block mt-1 w-full disabled" type="text" name="datum" value="{{ $data['datum'] }}" disabled/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-jet-label for="tijd" value="{{ __('Tijd') }}" />
                                        <x-jet-input id="tijd" class="block mt-1 w-full disabled" type="text" name="tijd" value="{{ $data['tijd'] }}" disabled/>
                                    </div>
                                </div>
                            </div>

                            <p><small>Met het versturen ga ik akkoord met de <a class="fc-primary" target="popup" onclick="window.open('{{$reglementen->reglementen}}','popup','width=600,height=600'); return false;">reglementen</a> van de examinering.</small></p>

                            <div class="mt-4">
                                <a href="{{ route('p5') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                                    <i class="fas fa-backward mr-2"></i> Terug
                                </a>
                                
                                <div class="form-group">
                                    <x-jet-button class="button" style="float: right">
                                        Inplannen <i class="fas fa-forward ml-2"></i> 
                                    </x-jet-button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
