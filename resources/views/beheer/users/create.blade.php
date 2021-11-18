<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Nieuwe gebruiker toevoegen')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-small-top') 

        <form method="post" action="{{ route('users.store') }}" class="mt-10">
            
            @csrf
            
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</label>
                        <input id="voornaam" class="block mt-1 w-full form-control" type="text" name="voornaam" value="{{old('voornaam')}}"/>
                        @livewire('includes.validation.input', ['input' => 'voornaam'])
                    </div>
                </div>  

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</label>
                        <input id="achternaam" class="block mt-1 w-full form-control" type="text" name="achternaam" value="{{old('achternaam')}}"/>
                        @livewire('includes.validation.input', ['input' => 'achternaam'])
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="{{old('email')}}"/>
                        @livewire('includes.validation.input', ['input' => 'email'])
                    </div>
                </div> 

                <div class="col-md-6 pr-2">
                    <div class="form-group">
                        <label for="password" class="block font-medium text-sm text-gray-700">Wachtwoord</label>
                        <input id="password" class="block mt-1 w-full form-control" type="password" name="password"/>
                        @livewire('includes.validation.input', ['input' => 'password'])
                    </div>
                </div> 

                <div class="col-md-6 pl-2">
                    <div class="form-group">
                    <label for="passwordconfirm" class="block font-medium text-sm text-gray-700">Wachtwoord bevestiging</label>
                        <input id="passwordconfirm" class="block mt-1 w-full form-control" type="password" name="passwordconfirm"/>
                        @livewire('includes.validation.input', ['input' => 'passwordconfirm'])
                    </div>
                </div> 

                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
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