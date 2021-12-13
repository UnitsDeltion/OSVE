<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Nieuwe examen toevoegen')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-normal-top') 

        <form method="post" action="{{ route('examens.store') }}">

            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="vak" :value="old('vak')"/>
                        @livewire('includes.validation.input', ['input' => 'vak'])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Examen</lable>
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" :value="old('examen')"/>
                        @livewire('includes.validation.input', ['input' => 'examen'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opleiding_id" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        <select id="opleiding_id" class="block mt-1 w-full form-control" name="opleiding_id" :value="old('opleiding_id')">
                            @foreach($opleidingen as $opleiding)
                                <option value="{{ $opleiding['id'] }}">{{ $opleiding['crebo_nr'] }} // {{ $opleiding['opleiding'] }}</option>
                            @endforeach
                        </select>
                        @livewire('includes.validation.input', ['input' => 'opleiding_id'])
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak_docent" class="block font-medium text-sm text-gray-700">Vak docent</lable>
                        <input id="vak_docent" class="block mt-1 w-full form-control" type="varchar" name="vak_docent" :value="old('vak_docent')"/>
                        @livewire('includes.validation.input', ['input' => 'vak_docent'])
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4" :value="old('uitleg')"></textarea>
                        @livewire('includes.validation.input', ['input' => 'uitleg'])
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('examens.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
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