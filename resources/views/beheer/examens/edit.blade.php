<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Examen bewerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-small-top')

        <form method="post" action="{{ route('examens.update', $examen['id']) }}" class="mt-10">

            @csrf
            @method('put')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="vak" value="{{ $examen['vak'] }}"/>
                        @livewire('includes.validation.input', ['input' => 'vak'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Examen</lable>
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" value="{{ $examen['examen'] }}"/>
                        @livewire('includes.validation.input', ['input' => 'examen'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opleiding_id" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        <select id="opleiding_id" class="block mt-1 w-full form-control" name="opleiding_id" value="{{ $examen['opleiding_id'] }}">
                            @foreach($opleidingen as $opleiding)
                                <option value="{{ $opleiding['id'] }}" 
                                <?php if($opleiding['id'] == $examen['opleiding_id']){echo 'selected';} ?>
                                >{{ $opleiding['opleiding'] }}</option>
                            @endforeach
                        </select>
                        @livewire('includes.validation.input', ['input' => 'opleiding_id'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="varchar" name="geplande_docenten" value="{{ $examen['geplande_docenten'] }}"/>
                        @livewire('includes.validation.input', ['input' => 'geplande_docenten'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen_begin" class="block font-medium text-sm text-gray-700">Opgeven examen begin</lable>
                        <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" value="{{ $examen['examen_opgeven_begin'] }}"/>
                        @livewire('includes.validation.input', ['input' => 'examen_opgeven_begin'])
                    </div>
                </div>
                        
                <div class="col-md-6">
                    <div class="form-group">
                    <lable for="opgeven_examen_eind" class="block font-medium text-sm text-gray-700">Opgeven examen eind</lable>
                        <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" value="{{ $examen['examen_opgeven_eind'] }}"/>
                        @livewire('includes.validation.input', ['input' => 'examen_opgeven_eind'])
                    </div>
                </div>
  
                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4" >{{ $examen['uitleg'] }}</textarea>
                        @livewire('includes.validation.input', ['input' => 'uitleg'])
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