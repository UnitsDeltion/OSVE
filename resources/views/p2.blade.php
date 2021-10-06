<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Opgave systeem voor examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

        <div class="">
        
        </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
