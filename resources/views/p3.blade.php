<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Sitemap')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

    <div class="card">
            <div class="card-header">
                Examens
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @error('examen')<div class="fc-red text-sm mb-2">{{ $message }}</div>@enderror
                        <form action="{{ route('p4') }}" method="get">
                            <div class="mb-20">
                                <div class="container mb-10">
                                    <div class="row justify-content-center">
                                       
                                            
                                            <div class="col-xs-5 mr-10 examen-input">
                                                <div class="row">
                                                @foreach($examens as $examen)
                                                    <div class="col-xs-8">
                                                        <?php
                                                            //dd($examen);
                                                            $examenVak = "";

                                                            
                                                            
                                                            if($examen->vak != $examenVak )
                                                            {
                                                                $examenVak = $examen->vak;
                                                                echo $examenVak;
                                                            }

                                                            
                                                            $examenVak = $examen->vak;
                                                            //dd($examenVak);
                                                    
                                                        ?>
                                                        {{ $examen->examen }}
                                                    </div>
                                                    
                                                    <div class="col-xs-2">
                                                        {{ $examen->plaatsen }}
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <input type="radio" name="examen" value="{{ $examen->examen }}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>  
                                                
                                    
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('p2') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                                <i class="fas fa-backward mr-2"></i> Terug
                            </a>

                            <div class="form-group">
                                <x-jet-button class="button" style="float: right">
                                    Verder <i class="fas fa-forward ml-2"></i> 
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer text-muted">
                Je kunt maar 1 examen tegelijk kiezen.
            </div>
        </div>
    </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
