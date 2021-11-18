<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle opleidingen')
                @yield('title')
            </h2>
            <a href="{{ route('opleidingen.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto;">
                <x-jet-button class="button">
                    {{ __('Opleiding toevoegen') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Crebo nummer</th>
                    <th>Opleiding</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($opleidingen as $opleiding)
                    <tr class="va-middle">
                        <td>{{$opleiding['crebo_nr']}}</td>
                        <td>{{$opleiding['opleiding']}}</td>
                        <td class="align-right pr-0">
                            <a href="{{ route('opleidingen.edit', $opleiding['crebo_nr'] ) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td>
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