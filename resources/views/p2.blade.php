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
                    <form method="POST" action="{{ route('p3') }}">
                        @csrf

                        <table class="table">
                            @foreach($opleidingen as $opleiding)
                                <tr>
                                    <td>{{$opleiding['crebo_nr']}}</td>
                                    <td>{{$opleiding['opleiding_naam']}}</td>
                                    <td><input type="radio" name="opleiding" value="{{$opleiding['opleiding_naam']}}"></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="flex">
                            <x-jet-button class="button float-right">
                                Verder <i class="fas fa-forward ml-2"></i> 
                            </x-jet-button>
                        </div>
                    </form> 

                    <a href="{{ route('p1') }}" class="a-clear float-left mb-2">
                        <x-jet-button class="button mb-2">
                            <i class="fas fa-backward mr-2"></i> Terug
                        </x-jet-button>
                    </a>
                </div>
            </div>
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
