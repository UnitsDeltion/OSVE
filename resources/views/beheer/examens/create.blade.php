<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Nieuwe examen toevoegen')
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
            
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="Vak" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="crebo_nr" class="block font-medium text-sm text-gray-700">crebo nummer</lable>
                        <input id="crebo_nr" class="block mt-1 w-full form-control" type="number" name="Crebo_nr" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="datums" class="block font-medium text-sm text-gray-700">Datums</lable>
                        <input id="datums" class="block mt-1 w-full form-control" type="text" name="Datums" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="tijdstippen" class="block font-medium text-sm text-gray-700">Tijdstippen</lable>
                        <input id="tijdstippen" class="block mt-1 w-full form-control" type="text" name="Tijdstippen" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="datums" class="block font-medium text-sm text-gray-700">Beschikbare plekken</lable>
                        <input id="datums" class="block mt-1 w-full form-control" type="select" name="Vak" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen_type" class="block font-medium text-sm text-gray-700">Type examen</lable>
                        <input id="examen_type" class="block mt-1 w-full form-control" type="text" name="Examen_type" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="number" name="Geplande_docenten" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen" class="block font-medium text-sm text-gray-700">Opgeven examen</lable>
                        <input id="opgeven_examen_begin" class="block mt-1 w-full form-control" type="text" name="Opgeven_examen_begin" required/>
                        <input id="opgeven_examen_eind" class="block mt-1 w-full form-control" type="text" name="Opgeven_examen_eind" required/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="Uitleg" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <x-jet-button class="dd-primary mb-2">
                        {{ __('Examen toevoegen') }}
                    </x-jet-button>
                </div>
            </div>
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>