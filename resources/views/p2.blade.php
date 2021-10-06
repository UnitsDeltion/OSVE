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
                <div class="col-md-7">
                    <h3>Opleidingen</h3>
                    @error('opleiding')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                    <form method="GET" action="{{ route('p3') }}">
                        <table class="table">
                            @foreach($opleidingen as $opleiding)
                                <tr>
                                    <td>{{$opleiding['crebo_nr']}}</td>
                                    <td>{{$opleiding['opleiding_naam']}}</td>
                                    <td><input type="radio" name="opleiding" value="{{$opleiding['opleiding_naam']}}"></td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="{{ route('p1') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
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

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
