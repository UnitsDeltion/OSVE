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
            <div class="row ml-70">
                <form method="POST" action="{{ route('f5') }}">
                    @csrf
                    <div class="mb-40">
                        <h3>Examen moment</h3>

                        <div class="container mb-10">
                            <div class="row">
                                @error('examen_moment')<div class="fc-red text-sm mb-2 text-center">{{ $message }}</div>@enderror
                                
                                <p>Gekozen examen: <span class="fc-primary-nh">{{ $vak}} {{ $examen }}</span></p>
                                <div class="container mb-10">
                                    <div class="row justify-content-center">

                                        <?php $examenDatum = ""; ?>
                                        @foreach($examenMoment as $examen)
                                            <?php
                                                setlocale(LC_TIME, 'NL_nl');
                                                $timestamp = strtotime($examen->datum);
                                                $day = date('l', $timestamp);

                                                if($examen->datum != $examenDatum ){
                                                    if ($examenDatum != ""){
                                                        echo "</div>";
                                                    }
                                                    echo "<div class=\"col-xs-5 mr-10 ml-10 mt-20 p-3 shadow \">";
                                                    echo "<h4 class=\"fc-secondary-nh\">".  $day  . "</h4>";
                                                }
                                                
                                                $examenDatum = $examen->datum;        
                                                
                                                
                                            ?>
                                            <!-- onclick="selectInput('p3', {{ $examen->id }}) -->

                                            <div class="row selectInput pb-1" onclick="selectInput('p4', {{ $examen->id }})">
                                                <div class="col-xs-10" title="Resterende aantal plaatsen">
                                                    {{ $examen->tijd }}
                                                    <!-- <i class="far fa-user fc-secondary"></i> {{ $examen->plaatsen }} -->
                                                </div>
                                                <div class="col-xs-2">
                                                    <input type="radio" name="examenMoment" id="{{ $examen->id }}" value="{{ $examen->datum }} - {{ $examen->tijd }}">
                                                </div>
                                            </div>
                                        @endforeach
                                            
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
