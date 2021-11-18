<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle examens')
                @yield('title')
            </h2>
            <a href="{{ route('examens.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto;">
                <x-jet-button class="button">
                    {{ __('Examen toevoegen') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Vak</th>
                    <th>Examen</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($examens as $examen)
                    <tr class="va-middle">
                        <td>{{ $examen['vak'] }}</td>
                        <td>{{ $examen['examen'] }}</td>
                        <td class="align-right pr-0">
                            <a href="{{ route('examens.show', $examen['id'] ) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-eye"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('examens.destroy', $examen['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <x-jet-button class="button" title="Verwijderen">
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