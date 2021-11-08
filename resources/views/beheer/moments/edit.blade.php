<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Examen moment bijwerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <a href="{{ route('examens.show', $examen['id']) }}" class="a-clear mb-2">
            <x-jet-button class="mb-2 button">
                {{ __('Terug naar examen') }}
            </x-jet-button>
        </a>

        <form method="post" action="{{ url('beheer/examenMomentUpdate/'.$examen['id'] )}}" enctype="multipart/form-data">

            @csrf
            @method('put')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="tijd" class="block font-medium text-sm text-gray-700">Tijdstippen</lable>
                        @error('tijd')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="tijd" class="block mt-1 w-full form-control" type="time" name="tijd" value="{{ $moment['tijd'] }}"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="plaatsen" class="block font-medium text-sm text-gray-700">Beschikbare plekken</lable>
                        @error('plaatsen')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="plaatsen" class="block mt-1 w-full form-control" type="number" name="plaatsen" value="{{ $moment['plaatsen'] }}"/>
                    </div>
                </div>

                <div class="form-group">
                    <x-jet-button class="mb-2 button">
                        {{ __('Examen moment bijwerken') }}
                    </x-jet-button>
                </div>
            </div>
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>