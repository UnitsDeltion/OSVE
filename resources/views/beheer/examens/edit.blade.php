<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Examen bijwerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <a href="{{ route('examens.index') }}" class="a-clear mb-2">
            <x-jet-button class="dd-primary mb-2">
                {{ __('Terug naar dashboard') }}
            </x-jet-button>
        </a>

        <form method="post" action="{{ route('examens.store') }}" enctype="multipart/form-data">

            @csrf
            @method('put')
            
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Vak</lable>
                        @error('examen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" value="{{ $examens['examen'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="crebo_nr" class="block font-medium text-sm text-gray-700">crebo nummer</lable>
                        @error('crebo_nr')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="crebo_nr" class="block mt-1 w-full form-control" type="number" name="crebo_nr" value="{{ $examens['crebo_nr'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="datum" class="block font-medium text-sm text-gray-700">Datums</lable>
                        @error('datum')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="datum" class="block mt-1 w-full form-control" type="date" name="datum" value="{{ $examens['datum'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="tijd" class="block font-medium text-sm text-gray-700">Tijdstippen</lable>
                        @error('tijd')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="tijd" class="block mt-1 w-full form-control" type="text" name="tijd" value="{{ $examens['tijd'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="plaatsen" class="block font-medium text-sm text-gray-700">Beschikbare plekken</lable>
                        @error('plaatsen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="plaatsen" class="block mt-1 w-full form-control" type="number" name="plaatsen" value="{{ $examens['plaatsen'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen_type" class="block font-medium text-sm text-gray-700">Type examen</lable>
                        @error('examen_type')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen_type" class="block mt-1 w-full form-control" type="text" name="examen_type" value="{{ $examens['examen_type'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        @error('geplande_docenten')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="number" name="geplande_docenten" value="{{ $examens['geplande_docenten'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen" class="block font-medium text-sm text-gray-700">Opgeven examen</lable>
                        @error('examen_opgeven_begin')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" value="{{ $examens['examen_opgeven_begin'] }}"/>
                        @error('examen_opgeven_eind')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" value="{{ $examens['examen_opgeven_eind'] }}"/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        @error('uitleg')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4" value="{{ $examens['uitleg'] }}"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <x-jet-button class="mb-2">
                        {{ __('Examen bijwerken') }}
                    </x-jet-button>
                </div>
            </div>
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>