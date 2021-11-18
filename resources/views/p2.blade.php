<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    <div id="notify"></div>
    @error('crebo_nr')
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

        <div class="containter mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h3>Opleidingen</h3>
                    <p class="fc-primary-nh fc-mobile">Kies onderstaand de juist opleiding. Staat je opleiding er niet bij? Neem dan contact op met je docent.</p>

                    <form method="POST" action="{{ route('f3') }}">
                        @csrf
                        <table class="table">
                            @foreach($opleidingen as $opleiding)
                                <tr class="selectInput" onclick="selectInput('p2', {{ $opleiding->id }})">
                                    <td>{{$opleiding['crebo_nr']}}</td>
                                    <td>{{$opleiding['opleiding']}}</td>
                                    <td><input type="radio" name="opleiding_id" id="{{$opleiding['id']}}" value="{{$opleiding['id']}}"></td>
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
