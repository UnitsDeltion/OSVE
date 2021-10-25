<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @livewire('includes.content.top.content-wide-top') 
    
    <div class="card-header">
        Ingeplande filters - {{ $filter->klas }}
    </div>
    
    <table class="table table-bordered" style="margin: 10px 0 10px 0;">
        <tr>
            <th>Student</th>
            <th>Examen</th>
            <th>Datum</th>
        </tr>
        @foreach($filters as $filter)
        <tr>
            <td>
                {{ $filter->student_nr }}
            </td>
            <td>
                {{ $filter->examen }}
            </td>
            <td>
                {{ $filter->datum }}
            </td>
        </tr>
        @endforeach
    </table>

</x-app-layout>