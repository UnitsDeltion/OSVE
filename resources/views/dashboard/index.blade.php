<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    @livewire('includes.content.top.content-wide-top') 
    
    <div class="card-header">
        Ingeplande Examens
    </div>

    <form action="/dashboard/klas" method="post">
        @csrf
        <tr>
            <td>klassen</td>
            <td> <input type="text" id="klas" name="klas"></td>
        </tr>
        <div class="text-center mb-2">
                            <x-jet-button class="dd-primary">
                                {{ __('Filter') }}
                            </x-jet-button>
                        </div>
    </form>

    <table class="table table-bordered" style="margin: 10px 0 10px 0;">
        <tr>
            <th>Student</th>
            <th>Klas</th>
            <th>Examen</th>
            <th>Datum</th>
        </tr>
        @foreach($examens as $examen)
        <tr>
            <td>
                {{ $examen->student_nr }}
            </td>
            <td>
                {{ $examen->klas }}
            </td>
            <td>
                {{ $examen->examen }}
            </td>
            <td>
                {{ $examen->datum }}
            </td>
        </tr>
        @endforeach
    </table>

</x-app-layout>