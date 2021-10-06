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
                <div class="col-md-7">
                    <form method="POST" action="{{ route('p2') }}">
                        @csrf

                        <div class="mb-3">
                            <x-jet-label for="voornaam" value="{{ __('Voornaam') }}" />
                            @error('voornaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                            <x-jet-input id="voornaam" class="block mt-1 w-full" type="text" name="voornaam" :value="old('voornaam')" autofocus />
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="achternaam" value="{{ __('Achternaam') }}" />
                            @error('achternaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                            <x-jet-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" :value="old('achternaam')"/>
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="studentnummer" value="{{ __('Studentnummer') }}" />
                            @error('studentnummer')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                            <x-jet-input id="studentnummer" class="block mt-1 w-full" type="number" name="studentnummer" :value="old('studentnummer')"/>
                        </div>

                        <!-- <div>
                            <x-jet-label for="studentEmail" value="{{ __('Student e-mail') }}" />
                            <x-jet-input id="studentEmail" class="block mt-1 w-full" type="email" name="studentEmail" :value="old('studentEmail')"/>
                        </div> -->

                        <div class="flex justify-center mt-4">
                            <x-jet-button class="button ml-4">
                                {{ __('Inloggen') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            
    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>