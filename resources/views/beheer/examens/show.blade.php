<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2>
                @section('title', 'Examen')
                @yield('title')
            </h2>
            <a href="{{ route('examenMomentCreate', $examen['id']) }}" class="a-clear" style="margin-right: 0; margin-left: auto; font-size: 12px!important;">
                <x-jet-button title="moment" class="mb-2 float-right mt-10 mr-10 button">
                    {{__('Examen moment aanmaken')}}
                </x-jet-button>
            </a>
            <a href="{{ route('examens.edit', $examen['id']) }}" class="a-clear"  >
                <x-jet-button title="Bewerken" class="mb-2 float-right mt-10 mr-10 button">
                    {{__('Examen bijwerken')}}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <a href="{{ route('examens.index') }}" class="a-clear mb-2">
            <x-jet-button class="mb-2 button">
                {{ __('Terug naar examen overzicht') }}
            </x-jet-button>
        </a>
        

        <form method="get" enctype="multipart/form-data">

            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        @error('vak')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="vak" value="{{ $examen['vak'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Examen</lable>
                        @error('examen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" value="{{ $examen['examen'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="crebo_nr" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        @error('crebo_nr')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <select id="crebo_nr" class="block mt-1 w-full form-control" name="crebo_nr" value="{{ $examen['crebo_nr'] }}" disabled>
                            @foreach($opleidingen as $opleiding)
                                <option value="{{ $opleiding['crebo_nr'] }}" 
                                <?php if($opleiding['crebo_nr'] == $examen['crebo_nr']){echo 'selected';} ?>
                                >{{ $opleiding['opleiding'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="datum" class="block font-medium text-sm text-gray-700">Datums</lable>
                        @error('datum')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="datum" class="block mt-1 w-full form-control" type="date" name="datum" value="{{ $examen['datum'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        @error('geplande_docenten')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="varchar" name="geplande_docenten" value="{{ $examen['geplande_docenten'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <lable for="opgeven_examen_begin" class="block font-medium text-sm text-gray-700">Opgeven examen begin</lable>
                                @error('examen_opgeven_begin')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" value="{{ $examen['examen_opgeven_begin'] }}" disabled/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <lable for="opgeven_examen_eind" class="block font-medium text-sm text-gray-700">Opgeven examen eind</lable>
                                @error('examen_opgeven_eind')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" value="{{ $examen['examen_opgeven_eind'] }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        @error('uitleg')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4" value="{{ $examen['uitleg'] }}" disabled></textarea>
                    </div>
                </div>

            </div>
        </form>
        <table class="table fz-14 br-5">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                        <strong>tijd</strong>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                        <strong>Plaatsen</strong>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
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
            </tbody>
        </table>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>