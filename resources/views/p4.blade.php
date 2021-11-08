<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    <div id="notify"></div>
    @error('tijd')
        <script>
            Notify({
                type: 'danger',
                duration: 50000,
                position: 'top center',
                title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                html: '<p class="align-center mb-0 fw-600 fc-primary-nh">{{ $message }}</p>',
            });
        </script>    
    @enderror

    @error('datum')
        <script>
            Notify({
                type: 'danger',
                duration: 50000,
                position: 'top center',
                title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                html: '<p class="align-center mb-0 fw-600 fc-primary-nh">{{ $message }}</p>',
            });
        </script>    
    @enderror

    @livewire('includes.content.top.content-normal-top')  
    
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('f5') }}">
                    @csrf
                    <div class="mb-40">
                        <h3>Examen moment</h3>

                        <div class="container mb-10">
                            <div class="row text-center">
                                @error('examen_moment')<div class="fc-red text-sm mb-2 text-center">{{ $message }}</div>@enderror
                                
                                <h3><span class="fc-primary-nh">{{ $vak}} {{ $examen }}</span></h3>
                                
                                <div class="datum">
                                    <div class="row justify-content-center">
                                        <h3>Datum</h3>
                                        <div class="card col-sm-3 mr-10 ml-10 selectInput shadow" style="" onclick="momentSelect('datum', '2021-8-24')">
                                            <div class="card-body">
                                                <h5 class="card-title">Dinsdag</h5>
                                                <p class="card-text">24-8-2021</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3 mr-10 ml-10 selectInput shadow" style="" onclick="momentSelect('datum', '2021-8-25')">
                                            <div class="card-body">
                                                <h5 class="card-title">Woensdag</h5>
                                                <p class="card-text">25-8-2021</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3 mr-10 ml-10 selectInput shadow" style="" onclick="momentSelect('datum', '2021-11-20')" id="test1">
                                            <div class="card-body">
                                                <h5 class="card-title">Dinsdag</h5>
                                                <p class="card-text">2021-11-20</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3 mr-10 ml-10 mt-20 selectInput shadow" style="" onclick="momentSelect('datum', '2021-9-03')">
                                            <div class="card-body">
                                                <h5 class="card-title">Vrijdag</h5>
                                                <p class="card-text">03-9-2021</p>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="mt-25">
                                    <div class="row justify-content-center">
                                        <h3>Tijd</h3>
                                        <div class="card col-sm-3 mr-10 ml-10 selectInput shadow" onclick="momentSelect('tijd', '12:30')" id="test">
                                            <div class="card-body">
                                                <h5 class="card-title">12:30</h5>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3 mr-10 ml-10 selectInput shadow" onclick="momentSelect('tijd', '12:00')" id="test1">
                                            <div class="card-body">
                                                <h5 class="card-title">012:00</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="datum" value="" id="datum">
                    <input type="hidden" name="tijd" value="" id="tijd">

                    <div class="mt-4">
                        <a href="{{ route('p3') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
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

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
