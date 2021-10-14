<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Nieuwe gebruiker toevoegen')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-small-top') 

        <form method="post" action="{{ route('users.store') }}" class="mt-10">
            @csrf
            
            <div class="row">
                <div class="col-md-6 pr-2">
                    <div class="form-group">
                        <label for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</label>
                        @error('voornaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="voornaam" class="block mt-1 w-full form-control" type="text" name="voornaam" value="{{old('voornaam')}}"/>
                    </div>
                </div>  

                <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</label>
                        @error('achternaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="achternaam" class="block mt-1 w-full form-control" type="text" name="achternaam" value="{{old('achternaam')}}"/>
                    </div>
                </div> 

                <div class="col-md-6 pr-2">
                    <div class="form-group">
                        <label for="telefoonnummer" class="block font-medium text-sm text-gray-700">Telefoonnummer</label>
                        @error('telefoonnummer')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="telefoonnummer" class="block mt-1 w-full form-control" type="text" name="telefoonnummer" value="{{old('telefoonnummer')}}"/>
                    </div> 
                </div> 

                <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                        @error('email')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="{{old('email')}}"/>
                    </div>
                </div> 

                <div class="col-md-6 pr-2">
                    <div class="form-group">
                        <label for="password" class="block font-medium text-sm text-gray-700">Wachtwoord</label>
                        @error('password')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="password" class="block mt-1 w-full form-control" type="password" name="password"/>
                    </div>
                </div> 

                <div class="col-md-6 pl-2">
                    <div class="form-group">
                    <label for="passwordconfirm" class="block font-medium text-sm text-gray-700">Wachtwoord bevestiging</label>
                        @error('passwordconfirm')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="passwordconfirm" class="block mt-1 w-full form-control" type="password" name="passwordconfirm"/>
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