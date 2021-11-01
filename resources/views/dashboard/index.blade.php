<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-wide-top') 

        <div>
            <h3>Ingeplane examens</h3>
            <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="ingeplandeExamens">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Klas</th>
                        <th>Examen</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h3>Opleidingen</h3>
            <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="opleidingen">
                <thead>
                    <tr>
                        <th>Crebo nummer</th>
                        <th>Opleiding</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($opleidingen as $opleiding)
                    <tr>
                        <td>
                            {{ $opleiding->crebo_nr }}
                        </td>
                        <td>
                            {{ $opleiding->opleiding }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-app-layout>

<script>
$(document).ready(function() {
    $('#ingeplandeExamens').DataTable( {
        "language": {
            "url": "{{asset('/json/datatabels/dutch')}}"
        }
    });
    $('#opleidingen').DataTable( {
        "language": {
            "url": "{{asset('/json/datatabels/dutch')}}"
        }
    });
});
</script>