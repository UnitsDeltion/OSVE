<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    <div id="notify"></div>
    @error('examen')
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

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })    
        </script>

        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('f4') }}">
                    @csrf
                    <div class="mb-40">
                        <h3>Examens</h3>

                        @if(!isset($examens[0]))
                            <div class="mt-50">
                                <h3 class="align-center">Momenten zijn er geen examens ingepland.</h3>
                                <h5 class="align-center">Neem contact op met je docent voor meer informatie.</h5>
                            </div>
                        @else

                            <p class="fc-primary-nh mb-0-r">Kies uit de onderstaande lijst het juiste examen. Staat het juiste examen er niet bij? Neem dan contact op met je docent.</p>
                            <div class="container mb-10">
                                <div class="row justify-content-center">

                                    <?php $examenVak = ""; ?>
                                    @foreach($examens as $examen)
                                        <?php
                                        $huidigeDatum = date('d-m-Y');
                                        $startDatum = date('d-m-Y', strtotime($examen->examen_opgeven_begin)); 
                                        $eindDatum = date('d-m-Y', strtotime($examen->examen_opgeven_eind)); 
                                        if($huidigeDatum > $startDatum && $huidigeDatum < $eindDatum){
                                        
                                            if($examen->vak != $examenVak ){
                                                if ($examenVak != ""){
                                                    echo "</div>";
                                                }
                
                                                echo "<div class=\"col-xs-5 mr-10 ml-10 mt-20 p-3 shadow\">";
                                                echo "<h4 class=\"fc-secondary-nh\">" . $examen->vak . "</h4>";
                                            }
                                        
                                            
                                            $examenVak = $examen->vak;
                                        }
                                        ?>
                                        <?php
                                        $huidigeDatum = date('d-m-Y');
                                        $startDatum = date('d-m-Y', strtotime($examen->examen_opgeven_begin)); 
                                        $eindDatum = date('d-m-Y', strtotime($examen->examen_opgeven_eind)); 
                                        if($huidigeDatum > $startDatum && $huidigeDatum < $eindDatum){
                                            
                                        ?>
                                        <div class="row selectInput pb-1" onclick="selectInput('p3', {{ $examen->id }})">
                                            <div class="col-xs-8 col-8 fc-primary-nh">
                                                {{ $examen->examen }} 
                                                
                                            </div>
                                            <div class="col-xs-1 col-1">
                                                <i class="fas fa-info-circle align-center" id="tooltipFaciliteitenpas" data-toggle="tooltip" data-bs-placement="bottom" title="{{ $examen->uitleg }}"></i>
                                            </div>
                                            <div class="col-xs-1 col-1">
                                                <input type="radio" name="examen" id="{{ $examen->id }}" value="{{ $examen->vak }} - {{ $examen->examen }}">
                                            </div>
                                        </div>
                                        <?php 
                                            }   
                                        else{
                                            }
                                            ?>
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
