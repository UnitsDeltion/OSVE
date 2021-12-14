<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Examen moment toevoegen')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-normal-top') 

        <form method="post" action="{{ route('momentsStore', $examen['id'] )}}" enctype="multipart/form-data">

            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="datum" class="block font-medium text-sm text-gray-700">Datum</lable>
                        <input id="datum" class="block mt-1 w-full form-control" type="date" name="datum" :value="old('datum')"/>
                        @livewire('includes.validation.input', ['input' => 'datum'])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="tijd" class="block font-medium text-sm text-gray-700">Tijdstippen</lable>
                        <input id="tijd" class="block mt-1 w-full form-control" type="time" name="tijd" :value="old('tijd')"/>
                        @livewire('includes.validation.input', ['input' => 'tijd'])
                    </div>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <lable for="plaatsen" class="block font-medium text-sm text-gray-700">Beschikbare plekken</lable>
                    <input id="plaatsen" class="block mt-1 w-full form-control" type="number" name="plaatsen" :value="old('plaatsen')"/>
                    @livewire('includes.validation.input', ['input' => 'plaatsen'])
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="varchar" name="geplande_docenten" :value="old('geplande_docenten')"/>
                        @livewire('includes.validation.input', ['input' => 'geplande_docenten'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen_begin" class="block font-medium text-sm text-gray-700">Opgeven examen begin</lable>
                        <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" :value="old('examen_opgeven_begin')"/>
                        @livewire('includes.validation.input', ['input' => 'examen_opgeven_begin'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen_eind" class="block font-medium text-sm text-gray-700">Opgeven examen eind</lable>
                            <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" :value="old('examen_opgeven_eind')"/>
                            @livewire('includes.validation.input', ['input' => 'examen_opgeven_eind'])
                        </div>
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