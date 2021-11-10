<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-small-top')  

    <div class="container">
        <div class="row">
            <div class="mt-50">
                <h3 class="align-center">{{ $title }}</h3>
                <h5 class="align-center">{{ $message }}</h5>
                @if($error != '')<h6 class="align-center fc-red"> {{ $error }} </h6> @endif
            </div>
        </div>
    </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
