<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Alle examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

                                <table class="w-full fz-14 br-5">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Examens</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Type</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Datums</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Beschikbare plekken</strong>
                                            </th>

                                            <th>
                                                <a href="{{ route('examens.create') }}" class="a-clear">
                                                    <x-jet-button class="mb-2 float-right mt-10 mr-10">
                                                        {{ __('Examen toevoegen') }}
                                                    </x-jet-button>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($examens as $examen)
                                        <tr>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['examen'] }}
                                            </td>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['examen_type'] }}
                                            </td>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['datum'] }}
                                            </td>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['plaatsen'] }}
                                            </td>

                                            <td class="px-6 pr-0 d-flex">
                                                <a href="{{ route('examens.show', $caravan['id'] ) }}" class="mb-2 mr-2 a-clear">
                                                    <x-jet-button class="dd-primary" title="Bekijken">
                                                        <i class="fas fa-eye fc-white"></i>
                                                    </x-jet-button>
                                                </a>
                                                <a href="{{ route('examens.edit', $caravan['id']) }}" class="mb-2 mr-2 a-clear">
                                                    <x-jet-button class="dd-primary" title="Bewerken">
                                                        <i class="fas fa-edit fc-white"></i>
                                                    </x-jet-button>
                                                </a>

                                                <form action="{{ route('examens.destroy', $caravan['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <x-jet-button class="dd-primary mr-2" title="Verwijderen">
                                                        <i class="fas fa-trash fc-red"></i>
                                                    </x-jet-button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>