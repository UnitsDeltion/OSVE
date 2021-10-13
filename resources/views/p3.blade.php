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
                <form method="GET" action="{{ route('p4') }}">
                    <div class="mb-40">
                        <h3>Examens</h3>

                        @if(!isset($examens[0]))
                            <div class="mt-50">
                                <h3 class="align-center">Momenten zijn er geen examens beschikbaar.</h3>
                                <h5 class="align-center">Neem contact op met je docent of kies een andere opleiding.</h5>
                            </div>
                        @else

                        <p class="fc-primary-nh">Kies uit de onderstaande luist het juiste examen. Staat het gewenste examen er niet bij? Neem dan contact op met je docent.</p>
                        <div class="container mb-10">
                            <div class="row justify-content-center">
                                @error('examen')<h6 class="fc-red mb-2 text-center">{{ $message }}</h6>@enderror

                                <?php $examenVak = ""; ?>
                                @foreach($examens as $examen)
                                    <?php
                                        if($examen->vak != $examenVak ){
                                            if ($examenVak != ""){
                                                echo "</div>";
                                            }
                                            echo "<div class=\"col-xs-5 mr-10 ml-10 mt-20 p-3 shadow\">";
                                            echo "<h4 class=\"fc-secondary-nh\">" . $examen->vak . "</h4>";
                                        }
                                        
                                        $examenVak = $examen->vak;                                    
                                    ?>
                                    <div class="row selectInput" onclick="selectInput({{ $examen->id }})">
                                        <div class="col-xs-8">
                                            {{ $examen->examen }}
                                        </div>
                                        
                                        <div class="col-xs-2" title="Resterende aantal plaatsen">
                                            <i class="far fa-user fc-secondary"></i> {{ $examen->plaatsen }}
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="hidden" name="vak" value="{{ $examen->vak }}">
                                            <input type="radio" name="examen" id="{{ $examen->id }}" value="{{ $examen->examen }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>  

                        @endif
                    </div>
                        
                    <div class="mt-4">
                        <a href="{{ route('p2') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                            <i class="fas fa-backward mr-2"></i> Terug
                        </a>

                        @if(isset($examens[0]))
                            <div class="form-group">
                                <x-jet-button class="button" style="float: right">
                                    Verder <i class="fas fa-forward ml-2"></i> 
                                </x-jet-button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
