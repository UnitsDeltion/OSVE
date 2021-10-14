<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Gebruiker bewerken')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-small-top')

        <form method="post" action="{{ route('users.update', $user->id) }}" class="mt-10">

            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-6 pr-2">
                    <div class="form-group">
                        <label for="voornaam" class="block font-medium text-sm text-gray-700">Voornaam</label>
                        @error('voornaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="voornaam" class="block mt-1 w-full form-control" type="text" name="voornaam" value="{{ $user->voornaam }}" autofocus/>
                    </div>
                </div>  

                <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label for="achternaam" class="block font-medium text-sm text-gray-700">Achternaam</label>
                        @error('achternaam')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="achternaam" class="block mt-1 w-full form-control" type="text" name="achternaam" value="{{ $user->achternaam }}"/>
                    </div>
                </div>  

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="telefoonnummer" class="block font-medium text-sm text-gray-700">Telefoonnummer</label>
                        @error('telefoonnummer')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="telefoonnummer" class="block mt-1 w-full form-control" type="telefoonnummer" name="telefoonnummer" value="{{ $user->telefoonnummer }}"/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        @error('email')<div class="fc-red text-sm">{{ $message }}</div>@enderror
                        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" value="{{ $user->email }}"/>
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