<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

        <div class="containter mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h3>Opleidingen</h3>
                    <p class="fc-primary-nh">Kies onderstaand de juist opleiding. Staat je opleiding er niet bij? Neem dan contact op met je docent.</p>

                    @error('crebo_nr')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                    <form method="POST" action="{{ route('f3') }}">
                        @csrf
                        <table class="table">
                            @foreach($opleidingen as $opleiding)
                                <tr class="selectInput" onclick="selectInput({{ $opleiding->crebo_nr }})">
                                    <td>{{$opleiding['crebo_nr']}}</td>
                                    <td>{{$opleiding['opleiding']}}</td>
                                    <td><input type="radio" name="crebo_nr" id="{{$opleiding['crebo_nr']}}" value="{{$opleiding['crebo_nr']}}"></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="mt-4">
                            <a href="{{ route('p1') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                                <i class="fas fa-backward mr-2"></i> Terug
                            </a>

                            <x-jet-button class="button" style="float: right">
                                Verder <i class="fas fa-forward ml-2"></i> 
                            </x-jet-button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        
    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
