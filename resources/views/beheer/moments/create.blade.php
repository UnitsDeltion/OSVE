<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Nieuwe examen moment toevoegen')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <form method="post" action="{{ route('momentsStore', $examen['id'] )}}" enctype="multipart/form-data">

            @csrf
            
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="datum" class="block font-medium text-sm text-gray-700">Datum</lable>
                    @error('datum')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                    <input id="datum" class="block mt-1 w-full form-control" type="date" name="datum" :value="old('datum')"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="tijd" class="block font-medium text-sm text-gray-700">Tijdstippen</lable>
                        @error('tijd')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="tijd" class="block mt-1 w-full form-control" type="time" name="tijd" :value="old('tijd')"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="plaatsen" class="block font-medium text-sm text-gray-700">Beschikbare plekken</lable>
                        @error('plaatsen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="plaatsen" class="block mt-1 w-full form-control" type="number" name="plaatsen" :value="old('plaatsen')"/>
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