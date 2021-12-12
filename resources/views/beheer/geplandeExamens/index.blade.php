<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle geplande examens')
                @yield('title')
            </h2>
        </div>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-10" role="alert">
                <p class="mb-0">{{$message}}</p>
            </div>
        @endif

        <table class="table mt-4">
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
                    <th></th>
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
                            {{ $geplandExamen->vak }} {{ $geplandExamen->gepland_examen }}
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
                                <p class="fc-secondary-nh" title="Examen is nog niet bevestigd door de docent">Niet bevestigd</p>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('geplandExamenDelete', $geplandExamen['id']) }}" title="Delete opleiding">
                                <x-jet-button class="button" title="Verwijderen">
                                        <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
        
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