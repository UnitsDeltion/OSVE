<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle gebruikers')
                @yield('title')
            </h2>
            <a href="{{ route('users.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto;">
                <x-jet-button class="button">
                    {{ __('Gebruiker toevoegen') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-wide-top') 
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Rollen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="va-middle">
                        <td>{{ $user->voornaam }} {{ $user->achternaam }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefoonnummer }}</td>
                        <td></td>
                        </td>
                        <td class="align-right pr-0">
                            <a href="{{ route('users.edit', $user->id) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <x-jet-button class="button">
                                    <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @livewire('includes.content.bottom.content-bottom') 
</x-app-layout>
