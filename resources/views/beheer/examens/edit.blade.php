<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Examen bijwerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <form method="post" action="{{ route('examens.update', $examen['id']) }}" enctype="multipart/form-data">

            @csrf
            @method('put')
            
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        @error('vak')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="vak" value="{{ $examen['vak'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Examen</lable>
                        @error('examen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" value="{{ $examen['examen'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="crebo_nr" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        @error('crebo_nr')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <select id="crebo_nr" class="block mt-1 w-full form-control" name="crebo_nr" value="{{ $examen['crebo_nr'] }}">
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
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        @error('geplande_docenten')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="varchar" name="geplande_docenten" value="{{ $examen['geplande_docenten'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <lable for="opgeven_examen_begin" class="block font-medium text-sm text-gray-700">Opgeven examen begin</lable>
                                @error('examen_opgeven_begin')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" value="{{ $examen['examen_opgeven_begin'] }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <lable for="opgeven_examen_eind" class="block font-medium text-sm text-gray-700">Opgeven examen eind</lable>
                                @error('examen_opgeven_eind')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                                <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" value="{{ $examen['examen_opgeven_eind'] }}"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        @error('uitleg')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4" >{{ $examen['uitleg'] }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('examens.show', $examen['id']) }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                        <i class="fas fa-backward mr-2"></i> Terug
                    </a>
                    
                    <div class="form-group">
                        <x-jet-button class="button" style="float: right">
                            Opslaan <i class="fas fa-forward ml-2"></i> 
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>