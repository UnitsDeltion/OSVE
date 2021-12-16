<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight r-title-big">
            Opgave systeem voor examens
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight r-title-small align-center">
            OSVE
        </h2>
    </x-slot>

    <div id="notify"></div>
    @error('examenMoment')
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

                        @if(!isset($examenMomenten[0]))
                            <div class="mt-50">
                                <h3 class="align-center">Momenten zijn er geen examen momenten ingepland.</h3>
                                <h5 class="align-center">Neem contact op met je docent voor meer informatie.</h5>
                            </div>
                        @else
                            <p class="fc-primary-nh mb-0-r">Kies uit de onderstaande lijst het gewenste examen moment. Staat het juiste examen moment er niet bij? Neem dan contact op met je docent.</p>
                            <div class="container mb-10">
                                <div class="row justify-content-center">
                                    @error('examen_moment')<div class="fc-red text-sm mb-2 text-center">{{ $message }}</div>@enderror
                                    
                                    <h3 style="text-align: center" class="mt-3"><span class="fc-primary-nh">{{ $vak}} {{ $examen }}</span></h3>

                                    <div class="container mb-10">
                                        <div class="row justify-content-center">

                                            <?php $examenDatum = "";
                                            foreach($examenMomenten as $examen){
                                                
                                                    $timestamp = strtotime($examen->datum);
                                                    $examenDatumFormatted = date('d-m-Y', strtotime($examen->datum)); 

                                                    if($examen->plaatsen >= 1){
                                                        
                                                        $timestamp = strtotime($examen->datum);
                                                        $examenDatumFormatted = date('d-m-Y', strtotime($examen->datum)); 

                                                            $day = date('l', $timestamp);
                                                            switch($day){
                                                                case "Monday":
                                                                    $day = "Maandag";
                                                                    break;
                                                                case "Tuesday":
                                                                    $day = "Dinsdag";
                                                                    break;
                                                                case "Wednesday":
                                                                    $day = "Woensdag";
                                                                    break;
                                                                case "Thursday":
                                                                    $day = "Donderdag";
                                                                    break;
                                                                case "Friday":
                                                                    $day = "Vrijdag";
                                                                    break;
                                                                case "Saturday":
                                                                    $day = "Zaterdag";
                                                                    break;
                                                                case "Sunday":
                                                                    $day = "Zondag";
                                                                    break;
                                                            }

                                                        if($examen->datum != $examenDatum ){
                                                            if ($examenDatum != ""){
                                                                echo "</div>";
                                                            }
                                                            echo "<div class=\"col-xs-12 col-sm-5 mr-10 ml-10 mt-20 p-3 shadow\">";
                                                            echo "<div class=\"row\"><div class=\"col-7 col-xs-8 col-sm-12 col-md-7\"><h4 class=\"fc-secondary-nh\">" . $day . "</h4></div><div class=\"col-5 col-xs-4 col-sm-12 p4-date col-md-5 ta-right \"><small>(" . $examenDatumFormatted . ")</small></div></div>";
                                                        }
                                                        
                                                        $examenDatum = $examen->datum;    
                                                    }      
                                                ?>

                                                    <div class="row selectInput pb-1" onclick="selectInput('p4', {{ $examen->id }})">
                                                        <div class="col-sm-12 row" title="Resterende aantal plaatsen">
                                                            <span class="col-5 col-sm-5 col-md-5 col-lg-7"> {{ date('H:i', strtotime($examen->tijd)); }} </span>
                                                            <span class="col-5 col-sm-5 col-md-5 col-lg-3 text-align-end"><i class="far fa-user fc-secondary"></i> {{ $examen->plaatsen }}</span>
                                                            <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                                <input type="radio" name="examenMoment" id="{{ $examen->id }}" value="{{ $examen->datum }} - {{ $examen->tijd }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }    
                                            ?>  
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    </div>

                    <div class="mt-4">
                        <a href="{{ route('p2') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                            <i class="fas fa-backward mr-2"></i> Terug
                        </a>

                        @if(isset($examenMomenten))
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
