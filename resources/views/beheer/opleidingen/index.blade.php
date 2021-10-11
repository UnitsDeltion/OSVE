<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Opleidingen crud')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <table class="table">
            <thead>
                <tr>
                    <th>Crebo nummer</th>
                    <th>Opleiding</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($opleidingen as $opleiding)
                    <tr class="">
                        <td>{{$opleiding['crebo_nr']}}</td>
                        <td>{{$opleiding['opleiding_naam']}}</td>
                        <td class="px-6 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="mb-2 mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>
                            <a href="#" class="mb-2 mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>            

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>