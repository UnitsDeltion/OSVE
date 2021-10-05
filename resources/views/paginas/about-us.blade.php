<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Over ons')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top') 

    <div class="container">
        <div class="row">
            <div class="col-sm-5"><img class="h-12 mb-4" src="{{ asset('deDisselPrimary.png') }}" /><img src="{{url('/caravan1.jpg')}}" alt="Image" class="br-10"/></div>
            <div class="col-sm-4"><h2>Wie zijn wij</h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempor quis enim eu venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec lectus mauris, aliquam id sapien sit amet, tincidunt posuere tellus. Sed vel commodo est. Vivamus rhoncus egestas nisl, sit amet feugiat arcu. Suspendisse eget ullamcorper neque. Duis sit amet tortor et lacus tempor venenatis. Nam auctor, lacus et pretium.</div>
            <div class="col-sm-3"><h2>Wat doen wij</h2>Nunc mattis turpis mauris, ut iaculis mi faucibus sed. Praesent gravida sed ligula vel volutpat. Vestibulum eget diam sollicitudin, maximus est vitae, sagittis lacus. Donec vulputate, magna sed sodales tempor, nunc lacus condimentum dui, id molestie arcu sapien vel sapien. Quisque elit magna, sagittis ac odio vitae, placerat porttitor tortor. Vivamus in lectus risus. Morbi.</div>
        </div>
    </div>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>