<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @section('title', 'Examen')
                @yield('title')
            </h2>
            <a href="{{ route('momentsCreate', $examen['id']) }}" class="a-clear" style="margin-right: 10px; margin-left: auto;">
                <x-jet-button title="moment" class="button">
                    {{__('Examen moment aanmaken')}}
                </x-jet-button>
            </a>
            <a href="{{ route('examens.edit', $examen['id']) }}" class="a-clear">
                <x-jet-button title="Bewerken" class="button">
                    {{__('Examen bewerken')}}
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

        <div class="row">
            <div class="mt-4">
                <a href="{{ route('examens.index') }}" class="fc-h-white a-clear float-left mb-2 button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition button float-right">
                    <i class="fas fa-backward mr-2"></i> Terug
                </a>
            </div>
        </div>
        
        <form method="get" enctype="multipart/form-data">

            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="vak" class="block font-medium text-sm text-gray-700">Vak</lable>
                        <input id="vak" class="block mt-1 w-full form-control" type="text" name="vak" value="{{ $examen['vak'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="examen" class="block font-medium text-sm text-gray-700">Examen</lable>
                        <input id="examen" class="block mt-1 w-full form-control" type="text" name="examen" value="{{ $examen['examen'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opleiding_id" class="block font-medium text-sm text-gray-700">Opleiding</lable>
                        <select id="opleiding_id" class="block mt-1 w-full form-control" name="opleiding_id" value="{{ $examen['opleiding_id'] }}" disabled>
                            @foreach($opleidingen as $opleiding)
                                <option value="{{ $opleiding['id'] }}" 
                                <?php if($opleiding['id'] == $examen['opleiding_id']){echo 'selected';} ?>
                                >{{ $opleiding['opleiding'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="geplande_docenten" class="block font-medium text-sm text-gray-700">Examinerende docenten</lable>
                        <input id="geplande_docenten" class="block mt-1 w-full form-control" type="varchar" name="geplande_docenten" value="{{ $examen['geplande_docenten'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <lable for="opgeven_examen_begin" class="block font-medium text-sm text-gray-700">Opgeven examen begin</lable>
                        <input id="examen_opgeven_begin" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_begin" value="{{ $examen['examen_opgeven_begin'] }}" disabled/>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                    <lable for="opgeven_examen_eind" class="block font-medium text-sm text-gray-700">Opgeven examen eind</lable>
                        <input id="examen_opgeven_eind" class="block mt-1 w-full form-control" type="date" name="examen_opgeven_eind" value="{{ $examen['examen_opgeven_eind'] }}" disabled/>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <lable for="uitleg" class="block font-medium text-sm text-gray-700">Uitleg</lable>
                        <textarea id="uitleg" class="block mt-1 w-full form-control" type="text" name="uitleg" rows="4"  disabled>{{ $examen['uitleg'] }}</textarea>
                    </div>
                </div>

            </div>
        </form>
        <table class="table fz-14 br-5">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Plaatsen</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($examen['examen_moments'] as $moment)
                    <tr>
                        <td class="px-6 text-sm text-gray-900">
                            {{ $moment['datum'] }}
                        </td>
                        <td class="px-6 text-sm text-gray-900">
                            {{ $moment['tijd'] }}
                        </td>
                        <td>
                            {{ $moment['plaatsen'] }}
                        </td>
                        <td class="align-right pr-0">
                            <a class="a-clear" href="{{ route('moments.edit', $moment['id']) }}">
                                <x-jet-button title="edit" class="mb-2 mr-2 button">
                                    <i class="fas fa-edit"></i>
                                </x-jet-button>
                            </a>

                            <a class="a-clear" data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('momentsDelete', $moment['id']) }}" title="Delete Moment">
                                <x-jet-button class="button" title="Verwijderen">
                                        <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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