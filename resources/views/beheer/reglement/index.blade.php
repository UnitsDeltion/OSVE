<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Reglement beheer')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-normal-top') 

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <form method="post" action="{{ route('reglement.store') }}" class="mt-10">
            @csrf

            <div class="form-group">
                <lable for="reglement" class="block font-medium text-sm text-gray-700">Reglement URL</lable>
                <input id="reglement" class="block mt-1 w-full form-control" type="text" name="reglement" value="{{ $reglement->reglement }}"/>
                @livewire('includes.validation.input', ['input' => 'reglement'])
            </div>

            <div class="mt-4">
                <a href="{{ route('dashboard.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                    <i class="fas fa-backward mr-2"></i> Terug
                </a>
                
                <div class="form-group">
                    <x-jet-button class="button" style="float: right">
                        Opslaan <i class="fas fa-forward ml-2"></i> 
                    </x-jet-button>
                </div>
            </div>
                
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>