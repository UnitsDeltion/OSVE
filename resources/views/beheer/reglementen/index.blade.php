<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Reglementen beheer')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.warnings.validation')

    @livewire('includes.content.top.content-small-top') 

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <form method="post" action="{{ route('reglementen.store') }}" class="mt-10">
            @csrf

            <div class="form-group">
                <lable for="reglementen" class="block font-medium text-sm text-gray-700">Reglementen URL</lable>
                <input id="reglementen" class="block mt-1 w-full form-control" type="text" name="reglementen" value="{{ $reglementen->reglementen }}"/>
                @error('reglementen') 
                    <script>
                        document.getElementById('reglementen').classList.add("bc-red", "sh-red"); 
                        document.getElementById('reglementen').classList.remove("shadow-sm"); 
                    </script>
                @enderror
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