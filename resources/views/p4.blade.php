<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

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
                                
                                <h2>Gekozen examen: <span class="fc-primary-nh">{{ $vak}} {{ $examen }}</span></h2>
                                
                                <div class="datum">
                                    <div class="row">
                                        <h3>Datum</h3>
                                        <div class="card col-sm-3" style="">
                                            <div class="card-body">
                                                <h5 class="card-title">Dinsdag</h5>
                                                <p class="card-text">24-8-2021</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3" style="">
                                            <div class="card-body">
                                                <h5 class="card-title">Woensdag</h5>
                                                <p class="card-text">25-8-2021</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3" style="">
                                            <div class="card-body">
                                                <h5 class="card-title">Dinsdag</h5>
                                                <p class="card-text">31-8-2021</p>
                                            </div>
                                        </div>

                                        <div class="card col-sm-3" style="">
                                            <div class="card-body">
                                                <h5 class="card-title">Vrijdag</h5>
                                                <p class="card-text">03-9-2021</p>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="tijd mt-2 d-flex justify-content-center">
                                    <div class="row" style="max-width: 70%;">
                                        <h3>Tijd</h3>
                                        <div class="card col-sm-6 mr-40" style="width:180px;">
                                            <div class="card-body">
                                                <h5 class="card-title">08:00 - 09:00</h5>
                                            </div>
                                        </div>

                                        <div class="card col-sm-6" style="width:180px;">
                                            <div class="card-body">
                                                <h5 class="card-title">08:00 - 09:00</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                            </div>
                        </div>
                    </div>

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
