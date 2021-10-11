<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Sitemap')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

    <div class="">
        <div class="card">
            <div class="card-header">
                Examens
            </div>
            <?php dd($examens);?>
            @foreach ($examens as $examen)
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6 col-sm-4 col-md-6 col-xl-3" style="border-width:1px;border-color:orange;">
                                <p><?php //dd($examen);?></p>
                                <ol>
                                    <!-- <li>{{ $examen['schrijf_examen'] }}<input type="radio" class="ml-15"></li> -->
                    
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- <a href="#" class="btn btn-primary right">Go somewhere</a> -->
                </div>
            @endforeach
            <div class="card-footer text-muted">
                Je kunt maar 1 examen tegelijk kiezen.
            </div>
        </div>
    </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>
