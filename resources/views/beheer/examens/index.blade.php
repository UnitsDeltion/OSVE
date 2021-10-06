<x-app-layout>
    <x-slot name="header">
        <h2>
            @section('title', 'Alle examens')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

                                <table class="w-full dd-primary-global fc-white fz-14 br-5">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Examens</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Datums</strong>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-medium uppercase tracking-wider">
                                                <strong>Beschikbare plekken</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($examens as $examen)
                                        <tr>
                                        <td class="px-6 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $examen->examen }}
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>