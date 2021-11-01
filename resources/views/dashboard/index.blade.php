<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-wide-top') 

        <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="form">
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
</x-app-layout>

<script>
// $(document).ready( function () {
//     $('#form').DataTable();
// } );

$(document).ready(function() {
    $('#form').DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "Geen examens ingepland",
            "info":           "Pagina _PAGE_ van _PAGES_ weergeven",
            "infoEmpty":      "0 tot 0 van 0 items weergeven",
            "infoFiltered":   "(gefilterd uit _MAX_ totale records)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Toon _MENU_ records per pagina",
            "loadingRecords": "Laden...",
            "processing":     "Verwerken...",
            "search":         "Zoeken:",
            "zeroRecords":    "Geen ingeplande examens gevonden",
            "paginate": {
                "first":      "Eerste",
                "last":       "Laatste",
                "next":       "Volgende",
                "previous":   "Vorige"
            },
            "aria": {
                "sortAscending":  ": activeren om kolom oplopend te sorteren",
                "sortDescending": ": activeren om kolom aflopend te sorteren"
            }
        }
    });
});
</script>