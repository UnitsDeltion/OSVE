<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-normal-top')

        <div class="containter mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>Persoonlijke gegevens</h3>

                    <form method="POST" action="{{ url('f2') }}">

                        @csrf
                    
                        <div class="mb-3">
                            <x-jet-label for="voornaam" value="{{ __('Voornaam') }}" />
                            <x-jet-input id="voornaam" class="block mt-1 w-full" type="text" name="voornaam" :value="old('voornaam')" autofocus />
                            @livewire('includes.validation.input', ['input' => 'voornaam'])
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="achternaam" value="{{ __('Achternaam') }}" />
                            <x-jet-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" :value="old('achternaam')"/>
                            @livewire('includes.validation.input', ['input' => 'achternaam'])
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="studentnummer" value="{{ __('Studentnummer') }}" />
                            <x-jet-input id="studentnummer" class="block mt-1 w-full" type="number" name="studentnummer" :value="old('studentnummer')"/>
                            @livewire('includes.validation.input', ['input' => 'studentnummer'])
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="klas" value="{{ __('Klas') }}" />
                            <x-jet-input id="klas" class="block mt-1 w-full" type="text" name="klas" :value="old('klas')"/>
                            @livewire('includes.validation.input', ['input' => 'klas'])
                        </div>  

                        <?php
// <div class="mb-3">
// <x-jet-label for="faciliteitenpas" value="{{ __('Faciliteitenpas') }}" />
// <select name="faciliteitenpas" id="faciliteitenpas" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
//     <option value="Nee" selected>Nee</option>
//     <option value="Ja">Ja</option>
// </select>
// @livewire('includes.validation.input', ['input' => 'faciliteitenpas'])
// </div>

// <div class="mb-3">
// <x-jet-label for="faciliteitenpas" value="{{ __('Opleiding') }}" />
// <select name="faciliteitenpas" id="faciliteitenpas" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
//     @foreach($opleidingen as $opleiding)
//         <option class="selectInput" onclick="selectInput('p2', {{ $opleiding->crebo_nr }})">{{$opleiding['crebo_nr']}} || {{$opleiding['opleiding']}}</option>
//     @endforeach
// </select>
// @livewire('includes.validation.input', ['input' => 'faciliteitenpas'])
// </div>
?>

                        <div class="mt-4">
                            <x-jet-button class="button" style="float: right">
                                Verder <i class="fas fa-forward ml-2"></i> 
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
        
    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
