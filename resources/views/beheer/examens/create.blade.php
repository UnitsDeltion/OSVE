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

        <form method="post" action="{{ route('caravans.store') }}" enctype="multipart/form-data">

            @csrf
            
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        <input id="vak" class="block mt-1 w-full form-control" type="select" name="Vak" required autofocus/>
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