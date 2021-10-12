<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Opleidingen beheer')
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($opleidingen as $opleiding)
                    <tr>
                        <td>{{$opleiding['crebo_nr']}}</td>
                        <td>{{$opleiding['opleiding_naam']}}</td>
                        <td class="px-6 whitespace-nowrap text-sm font-medium align-right">
                            <a href="{{ route('opleidingen.edit', $opleiding['crebo_nr'] ) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td class="px-6 whitespace-nowrap text-sm font-medium">
                            <form action="{{ route('opleidingen.destroy', $opleiding['crebo_nr']) }}" method="POST" onsubmit="return confirm('Weet u het zeker?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <x-jet-button class="button">
                                    <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>            

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>