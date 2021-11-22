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

        <table class="table mt-4">
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
                        <a data-toggle="modal" id="deleteButton" data-target="#deleteModal" data-attr="{{ route('examenDelete', $examen['id']) }}" title="Delete Examen">
                            <!-- <i class="fas fa-trash text-danger  fa-lg"></i> -->
                            <x-jet-button class="button" title="Verwijderen">
                                    <i class="fas fa-trash"></i>
                            </x-jet-button>
                         </a>
                            <!-- <form action="{{ route('examens.destroy', $examen['id']) }}" method="POST" onsubmit="return confirm('Weet je het zeker');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <x-jet-button class="button" title="Verwijderen">
                                    <i class="fas fa-trash"></i>
                                </x-jet-button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteBody">
                <div>
                    <!-- body content -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display delete modal
    $(document).on('click', '#deleteButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModal').modal("show");
                $('#deleteBody').html(result).show();
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