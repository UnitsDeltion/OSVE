<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Alle gebruikers')
            @yield('title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="content">
                            @if($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                                    <p class="mb-0">{{$message}}</p>
                                </div>
                            @endif
                                <table class="w-full fz-14 br-5 background">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>ID</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Gebruikersnaam</strong>
                                            </th>
                                            <th scope="col" class="py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Email</strong>
                                            </th>
                                            <th scope="col" class="py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Telefoonnummer</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Rollen</strong>
                                            </th>
                                            <th scope="col"  class="px-6 py-3">
                                                Acties
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->id }}
                                                </td>

                                                <td class="px-6 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->name }}
                                                </td>

                                                <td class="px-6whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->email }}
                                                </td>

                                                <td class="px-6whitespace-nowrap text-sm text-gray-900">
                                                    {{ $user->telefoonnummer }}
                                                </td>

                                                <td class="px-6 whitespace-nowrap text-sm text-gray-900">
                                                    @foreach ($user->roles as $role)
                                                        <span class="px-2 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800 <?php if($role->title == 'Beheerder'){echo 'fc-dd-primary';} ?>">
                                                            {{ $role->title }}
                                                        </span>
                                                    @endforeach
                                                </td>

                                                <td class="px-6 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('users.show', $user->id) }}" class="mb-2 mr-2 a-clear">
                                                        <x-jet-button class="dd-primary">
                                                            {{ __('Bekijken') }}
                                                        </x-jet-button>
                                                    </a>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="mb-2 mr-2 a-clear">
                                                        <x-jet-button class="dd-primary">
                                                            {{ __('Bewerken') }}
                                                        </x-jet-button>
                                                    </a>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                            @if($user->status == 1)
                                                                <x-jet-button class="bg-red">
                                                                    {{ __('Deactiveer') }}
                                                                </x-jet-button>
                                                            @elseif($user->status == 0)
                                                                <x-jet-button class="dd-primary">
                                                                    {{ __('Activeer') }}
                                                                </x-jet-button>
                                                            @endif
                                        
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
