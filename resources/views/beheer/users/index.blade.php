<x-app-layout>
    <x-slot name="header">
        <div class="d-flex" style="width: 100%;">
            <h2 class="align-self-start font-semibold text-xl text-gray-800 leading-tight row">
                @section('title', 'Alle gebruikers')
                @yield('title')
            </h2>
            <a href="{{ route('users.create') }}" class="a-clear" style="margin-right: 0; margin-left: auto;">
                <x-jet-button class="button">
                    {{ __('Gebruiker toevoegen') }}
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

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="va-middle">
                    <td>{{ $user->voornaam }} {{ $user->achternaam }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="align-right pr-0">
                        <a href="{{ route('users.edit', $user->id) }}" class="mr-2 a-clear">
                            <x-jet-button class="button">
                                <i class="fas fa-edit"></i>
                            </x-jet-button>
                        </a>
                    </td>
                    <td>
                        <a data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('usersDelete', $user->id) }}" title="Delete User">
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
