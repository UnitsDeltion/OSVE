<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight r-title-big">
            Opgave systeem voor examens
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight r-title-small align-center">
            OSVE
        </h2>
    </x-slot>
    
    @livewire('includes.content.top.content-small-top')  

    <div class="container">
        <div class="row">
            <div class="mt-40">
                <h3 class="align-center">Controleer je e-mail!</h3>
                <h5 class="align-center">Voordat het examen definitief is ingepland moet deze eerst worden bevestigd. <br> Er is een e-mail verstuurd naar <span class="fc-secondary-nh">{{ $studentnummer }}@st.deltion.nl</span>. Gebruik de link in de e-mail om het examen te bevestigen.</h5>

                <h5 class="align-center fc-red mt-4 mb-0-r"><strong>Let op!</strong></h5>
                <h5 class="align-center">Je hebt 24 uur om het examen te bevestigen. Na deze 24 uur wordt de gereserveerde plek weer vrijgegeven.</h5>
            </div>
            <form method="post" class="text-center" action="{{ route('ics_handler') }}">
                @csrf
                <x-jet-button class="button mt-15">
                    Download afspraak <i class="fas fa-download ml-2"></i> 
                </x-jet-button>
            </form>
        </div>
    </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
