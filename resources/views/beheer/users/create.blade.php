<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Nieuwe gebruiker toevoegen')
                @yield('title')
            </h2>
            <a href="{{ route('users.index') }}" class="a-clear" style="margin-right: 0; margin-left: auto; font-size: 12px!important;">
                <x-jet-button>
                    {{ __('Terug naar dashboard') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">

            @csrf
            
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</label>
                        <input id="voornaam" class="block mt-1 w-full form-control" type="text" name="Voornaam" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</label>
                        <input id="achternaam" class="block mt-1 w-full form-control" type="text" name="Achternaam" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefoonnummer" class="block font-medium text-sm text-gray-700">Telefoonnummer</label>
                        <input id="telefoonnummer" class="block mt-1 w-full form-control" type="text" name="Telefoonnummer" required/>
                    </div>
                    <div class="form-group">
                        <label for="password" class="block font-medium text-sm text-gray-700">Wachtwoord</label>
                        <input id="password" class="block mt-1 w-full form-control" type="password" name="Email" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                        <input id="email" class="block mt-1 w-full form-control" type="email" name="Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="passwordconfirm" class="block font-medium text-sm text-gray-700">Wachtwoord Bevestiging</label>
                        <input id="passwordconfirm" class="block mt-1 w-full form-control" type="passwordconfirm" name="Passwordconfirm" required/>
                    </div>
                </div>

                <div class="form-group">
                    <x-jet-button class="dd-primary mb-2">
                        {{ __('Gebruiker toevoegen') }}
                    </x-jet-button>
                </div>
            </div>
        </form>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>