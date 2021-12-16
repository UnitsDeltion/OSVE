<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle examens')
                @yield('title')
            </h2>
            <a href="{{ route('examens.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto;">
                <x-jet-button class="button">
                    {{ __('Examen toevoegen') }}
                </x-jet-button>
            </a>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <table class="table mt-4" id="examens">
            <thead>
                <tr>
                    <th>Vak</th>
                    <th>Examen</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($examens as $examen)
                    <tr class="va-middle">
                        <td>{{ $examen['vak'] }}</td>
                        <td>{{ $examen['examen'] }}</td>
                        <td class="align-right pr-0">
                            <a href="{{ route('examens.show', $examen['id'] ) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-eye"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td> 
                            <a class="a-clear" data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('examenDelete', $examen['id']) }}" title="Delete Examen">
                                <x-jet-button class="button" title="Verwijderen">
                                        <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <?php
            $user = \Auth::user();
        ?>
        @if($user->isAn('beheerder')) 
        <table class="table mt-4" id="examens">
            <h3 class="mt-50">Verwijderde    examens</h3>
            <thead>
                <tr>
                    <th>Vak</th>
                    <th>Examen</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inactiveExamens as $inactiveExamen)
                    <tr class="va-middle">
                        <td>{{ $inactiveExamen['vak'] }}</td>
                        <td>{{ $inactiveExamen['examen'] }}</td>
                        <td class="align-right pr-0">
                            <a href="{{ route('examens.show', $inactiveExamen['id'] ) }}" class="mr-2 a-clear">
                                <x-jet-button class="button">
                                    <i class="fas fa-eye"></i>
                                </x-jet-button>
                            </a>
                        </td>
                        <td>
                            <a class="a-clear" data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('examenDelete', $inactiveExamen['id']) }}" title="Delete Examen">
                                <x-jet-button class="button" title="Verwijderen">
                                        <i class="fas fa-history"></i>
                                </x-jet-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- large modal -->
        <div class="modal fade" id="largeModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="largeBody">
                        <div>
                            <!-- body content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    $(document).ready(function() {
        $('#examens').DataTable( {
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
            ],        
        });
    });

    // display delete modal
    $(document).on('click', '#largeButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#largeModal').modal("show");
                $('#largeBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
</script>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>