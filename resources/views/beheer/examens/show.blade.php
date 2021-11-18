<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2>
                @section('title', 'Examen')
                @yield('title')
            </h2>
            <a href="{{ route('momentsCreate', $examen['id']) }}" class="a-clear" style="margin-right: 0; margin-left: auto; font-size: 12px!important;">
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
        <div class="row">
            <div class="mt-4">
                <a href="{{ route('examens.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                    <i class="fas fa-backward mr-2"></i> Terug
                </a>
            </div>
        </div>
        
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
                        <lable for="opleiding_id" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        @error('opleiding_id')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <select id="opleiding_id" class="block mt-1 w-full form-control" name="opleiding_id" value="{{ $examen['opleiding_id'] }}" disabled>
                            @foreach($opleidingen as $opleiding)
                                <option value="{{ $opleiding['id'] }}" 
                                <?php if($opleiding['id'] == $examen['opleiding_id']){echo 'selected';} ?>
                                >{{ $opleiding['opleiding'] }}</option>
                            @endforeach
                        </select>
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
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4"  disabled>{{ $examen['uitleg'] }}</textarea>
                    </div>
                </div>

            </div>
        </form>
        <table class="table fz-14 br-5">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                        <strong>datum</strong>
                    </th>
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
                            {{ $moment['datum'] }}
                        </td>
                        <td class="px-6 text-sm text-gray-900">
                            {{ $moment['tijd'] }}
                        </td>
                        <td class="px-6 text-sm text-gray-900">
                            {{ $moment['plaatsen'] }}
                        </td>
                        <td class="px-6 pr-0 d-flex">
                            <a href="{{ route('moments.edit', $moment['id']) }}">
                                <x-jet-button title="edit" class="mb-2 mr-2 button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>

                            <form action="{{ route('moments.destroy', $moment['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
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