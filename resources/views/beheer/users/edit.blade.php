<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Gebruiker bewerken')
            @yield('title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="content">
                                <form method="post" action="{{ route('users.update', $user->id) }}">

                                    @csrf
                                    @method('put')

                                    <div class="row">
                                        <!--Gebruiker gegevens -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable for="name" class="block font-medium text-sm text-gray-700">Gebruikersnaam</lable>
                                                <input id="name" class="block mt-1 w-full form-control" type="text" name="name" value="{{ $user->name }}" required autofocus disabled/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pr-2">
                                            <div class="form-group">
                                                <lable for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</lable>
                                                <input id="voornaam" class="block mt-1 w-full form-control" type="text" name="voornaam" value="{{ $user->voornaam }}" required autofocus/>
                                            </div>
                                        </div>  

                                        <div class="col-md-6 pl-2">
                                            <div class="form-group">
                                                <lable for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</lable>
                                                <input id="achternaam" class="block mt-1 w-full form-control" type="text" name="achternaam" value="{{ $user->achternaam }}" required autofocus/>
                                            </div>
                                        </div>  

                                        <!--Adres gegevens -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable for="adres" class="block font-medium text-sm text-gray-700">Adres</lable>
                                                <input id="adres" class="block mt-1 w-full form-control" type="text" name="adres" value="{{ $user->adres }}" required autofocus/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pr-2">
                                            <div class="form-group">
                                                <lable for="postcode" class="block font-medium text-sm text-gray-700">Postcode</lable>
                                                <input id="postcode" class="block mt-1 w-full form-control" type="text" name="postcode" value="{{ $user->postcode }}" required autofocus/>
                                            </div>
                                        </div>  

                                        <div class="col-md-6 pl-2">
                                            <div class="form-group">
                                                <lable for="plaatsnaam" class="block font-medium text-sm text-gray-700">Plaatsnaam</lable>
                                                <input id="plaatsnaam" class="block mt-1 w-full form-control" type="text" name="plaatsnaam" value="{{ $user->plaatsnaam }}" required autofocus />
                                            </div>
                                        </div> 

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable for="land" class="block font-medium text-sm text-gray-700">Land</lable>
                                                <input id="land" class="block mt-1 w-full form-control" type="text" name="land" value="{{ $user->land }}" required autofocus>
                                            </div>
                                        </div>

                                        <!--Gebruiker gegevens -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable for="telefoonnummer" class="block font-medium text-sm text-gray-700">Telefoonnummer</lable>
                                                <input id="telefoonnummer" class="block mt-1 w-full form-control" type="telefoonnummer" name="telefoonnummer" value="{{ $user->telefoonnummer }}" required autofocus/>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <lable for="email" class="block font-medium text-sm text-gray-700">Email</lable>
                                                <input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="{{ $user->email }}" required autofocus/>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="roles" class="block font-medium text-sm text-gray-700">Rollen</label>
                                                <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                                    @foreach($roles as $id => $role)
                                                        <option value="{{ $id }}"{{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                                            {{ $role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('roles')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <x-jet-button class="dd-primary mt-3 ml-3 align-center w-15">
                                            {{ __('Opslaan') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>