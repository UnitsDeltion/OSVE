<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2>
                @section('title', 'Alle examens')
                @yield('title')
            </h2>
            <a href="{{ route('examens.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto; font-size: 12px!important;">
                <x-jet-button class="mb-2 float-right mt-10 mr-10 button">
                    {{ __('Examen toevoegen') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

                                <table class="table fz-14 br-5">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Vak</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Examen</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Datum</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($examens as $examen)
                                        <tr>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['vak'] }}
                                            </td>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['examen'] }}
                                            </td>
                                            <td class="px-6 text-sm text-gray-900">
                                                {{ $examen['datum'] }}
                                            </td>

                                            <td class="px-6 pr-0 d-flex float-right">
                                                <a href="{{ route('examens.show', $examen['id'] ) }}">
                                                    <x-jet-button title="Bekijken" class="mb-2 mr-2 button">
                                                        <i class="fas fa-eye"></i>
                                                    </x-jet-button>
                                                </a>

                                                <form action="{{ route('examens.destroy', $examen['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <x-jet-button class="mr-2 button" title="Verwijderen">
                                                        <i class="fas fa-trash"></i>
                                                    </x-jet-button>
                                                </form>
                                            </td>
                            
                                           <!-- <td>
                                               <table>
                                                    @foreach($examen['examen_moments'] as $moment)
                                                    <tr>
                                                        <td class="px-6 text-sm text-gray-900">
                                                            {{ $moment['tijd'] }}
                                                        </td>
                                                        <td class="px-6 text-sm text-gray-900">
                                                            {{ $moment['plaatsen'] }}
                                                        </td>
                                                        <td class="px-6 pr-0 d-flex">
                                                            <a href="{{ route('examenMomentEdit', $moment['id']) }}">
                                                                <x-jet-button title="edit" class="mb-2 mr-2 button">
                                                                    <i class="fas fa-edit"></i>
                                                                </x-jet-button>
                                                            </a>

                                                            <form action="{{ route('examenMomentDelete', $moment['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <x-jet-button class="mr-2 button" title="Verwijderen">
                                                                    <i class="fas fa-trash"></i>
                                                                </x-jet-button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </td> -->

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>