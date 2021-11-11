<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-small-top')  

    <div class="container">
        <div class="row">
            <div class="mt-50">
                <h3 class="align-center">Controleer je e-mail</h3>
                <h5 class="align-center">Voordat het examen definitief is ingepland moet deze eerst bevestigd worden. Er is een e-mail verstuurd naar <span class="fc-secondary-nh">{{ $studentnummer }}@st.deltion.nl</span>. Gebruik de link in de e-mail om het examen te bevestigen.</h5>
                <form method="post" action="{{ route('ics_handler') }}">
                    @csrf
                    <x-jet-button class="button" style="float: right">
                        Download afspraak <i class="fas fa-download ml-2"></i> 
                    </x-jet-button>
                </form>
                <h6>Of ga naar de <a href="/">homepagina</a>.</h6>
            </div>
        </div>
    </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
