<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @livewire('includes.validation.warning')

    @livewire('includes.content.top.content-wide-top') 

        <div class="pagination justify-content-center">
            <a href="#1" class="activePage" id="pagButtonOne" title="Studenten" onclick="pagination('1')"><i class="fas fa-user-graduate"></i> Ingeplande examens</a>
            <a href="#2" class="" id="pagButtonTwo" title="Docenten" onclick="pagination('2')"><i class="fas fa-chalkboard-teacher"></i> Alle examens</a>
            <a href="#3" class="" id="pagButtonThree" title="Klassen" onclick="pagination('3')"><i class="fas fa-school"></i> Opleidingen</a>
        </div>

        <br>

        <div id="elementOne">
            <h3>Ingeplande examens</h3>
            <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="ingeplandeExamens">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Faciliteitenpas</th>
                        <th>Klas</th>
                        <th>Examen</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Student bevestigd</th>
                        <th>Docent bevestigd</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geplandeExamens as $geplandExamen)
                    <tr>
                        <td>
                            {{ $geplandExamen->voornaam }} {{ $geplandExamen->achternaam }} <small>({{ $geplandExamen->studentnummer }})</small>
                        </td>
                        <td>
                            {{ $geplandExamen->faciliteitenpas }}
                        </td>
                        <td>
                            {{ $geplandExamen->klas }}
                        </td>
                        <td>
                            {{ $geplandExamen->gepland_examen }}
                        </td>
                        <td>
                            {{date('d-m-Y', strtotime($geplandExamen['datum']))}}
                        </td>
                        <td>
                            {{date('H:i', strtotime($geplandExamen['tijd']))}}
                        </td>
                        <td>
                            @if($geplandExamen->std_bevestigd == '1')
                                <p class="fc-primary-nh">Bevestigd</p>
                            @else
                                <p class="fc-secondary-nh" title="Examen is nog niet bevestigd door de student">Niet bevestigd</p>
                            @endif
                        </td>
                        <td>
                            @if($geplandExamen->doc_bevestigd == '1')
                                <p class="fc-primary-nh">Bevestigd</p>
                            @else
                                <x-jet-button class="button" id="button{{ $geplandExamen->id }}" onclick="selectInput('dashboard', 'examenBevestigen', '{{ $geplandExamen->id }}')">
                                    Selecteren
                                </x-jet-button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>

            <form action="{{ route('bevestigExamen') }}" method="post">
                @csrf
                <input type="hidden" name="examenBevestigen" id="examenBevestigen" value="">

                <x-jet-button class="button">
                    Examens bevestigen
                </x-jet-button>
            </form>
        </div>

        <div id="elementTwo" style="display: none;">
            <h3>Actieve examens</h3>
            <p>Active examens zijn examens waarbij vandaag een examen moment is ingepland.</p>
            <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="actieveExamens">
                <thead>
                    <tr>
                        <th>Vak</th>
                        <th>Examen</th>
                        <th>Geplande docent</th>
                        <th>Eerste datum</th>
                        <th>Laatste datum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeExamens as $activeExamen)
                        <tr>
                            <td>
                                {{ $activeExamen->vak }}
                            </td>
                            <td>
                                {{ $activeExamen->examen }}
                            </td>
                            <td>
                                @foreach($activeExamen->geplande_docenten as $docent)
                                    {{ $docent }},
                                @endforeach
                            </td>
                            <td>
                                {{ $activeExamen->startDatum }}
                            </td>
                            <td>
                                {{ $activeExamen->eindDatum }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <h3>Alle examens</h3>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="min">Eerste datum</label>
                        <input type="text" class="form-control" id="min" name="min" placeholder="Eerst datum">
                    </div>
                </div>
    
            <table class="table table-bordered" style="margin: 10px 0 10px 0;" id="toekomstigeExamens">
                <thead>
                    <tr>
                        <th>Vak</th>
                        <th>Examen</th>
                        <th>Geplande docent</th>
                        <th>Eerste datum</th>
                        <th>Laatste datum</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @foreach($examens as $examen)
                        <tr>
                            <td>
                                {{ $examen->vak }}
                            </td>
                            <td>
                                {{ $examen->examen }}
                            </td>
                            <td>
                                @foreach($examen->geplande_docenten as $docent)
                                    {{ $docent }},
                                @endforeach
                            </td>
                            <td id="min">
                                {{ $examen->startDatum }}
                            </td>
                            <td id="max">
                                {{ $examen->eindDatum }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="elementThree" style="display: none;">
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
    var minDate, maxDate;
 
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[3] );
            if (
                ( min === null && max === null ) ||
                ( min === null && mdate <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        $('#ingeplandeExamens').DataTable( {
            "language": {
                "url": "{{asset('/beheer/json/datatabels/dutch')}}",
            },
            dom: 'Bfrtip',
        
            buttons: [
                'excel', {
                
                extend: 'pdfHtml5',
                customize: function(doc) {
                    doc.defaultStyle.alignment = 'right';
                    doc.styles.tableHeader.color = 'white';
                    doc.styles.tableHeader.fillColor = '#F58220';
                },
            
                download: 'open',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }},
            ]
            ,
        
            
        });
        $('#actieveExamens').DataTable( {
            "language": {
                "url": "{{asset('/beheer/json/datatabels/dutch')}}"
            }
        });


        $('#toekomstigeExamens').DataTable( {
            "language": {
                "url": "{{asset('/beheer/json/datatabels/dutch')}}"
            },
        });
        $('#opleidingen').DataTable( {
            "language": {
                "url": "{{asset('/beheer/json/datatabels/dutch')}}"
            }
        });
    });

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
    
        // DataTables initialisation
        var table = $('#toekomstigeExamens').DataTable();
    
        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>