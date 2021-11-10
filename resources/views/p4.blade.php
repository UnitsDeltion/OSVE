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
                            <div class="row">
                                @error('examen_moment')<div class="fc-red text-sm mb-2 text-center">{{ $message }}</div>@enderror
                                
                                <p>Gekozen examen: <span class="fc-primary-nh">{{ $vak}} {{ $examen }}</span></p>


                                @foreach($examenMoment as $examen)
                                    <?php
                                        // if($examen->vak != $examenVak ){
                                        //     if ($examenVak != ""){
                                        //         echo "</div>";
                                        //     }
                                        //     echo "<div class=\"col-xs-5 mr-10 ml-10 mt-20 p-3 shadow\">";
                                        //     echo "<h4 class=\"fc-secondary-nh\">" . $examen->vak . "</h4>";
                                        // }
                                        
                                        // $examenVak = $examen->vak;        
                                        
                                        
                                    ?>
                                    <!-- onclick="selectInput('p3', {{ $examen->id }}) -->
                                    <div class="row selectInput pb-1">
                                        <div class="col-xs-8 fc-primary-nh">
                                            {{ $examen->datum }}
                                        </div>
                                        
                                        <div class="col-xs-2" title="Resterende aantal plaatsen">
                                            {{ $examen->tijd }}
                                            <!-- <i class="far fa-user fc-secondary"></i> {{ $examen->plaatsen }} -->
                                        </div>
                                        <div class="col-xs-2">
                                            <!-- <input type="radio" name="examen" id="{{ $examen->id }}" value="{{ $examen->vak }} - {{ $examen->examen }}">
                                        --> </div>
                                    </div>
                                    @endforeach
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
