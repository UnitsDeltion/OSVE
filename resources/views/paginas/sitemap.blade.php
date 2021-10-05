<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('title', 'Sitemap')
            @yield('title')
        </h2>
    </x-slot>

    @livewire('includes.content.top.content-normal-top')  

        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae facilis odit hic itaque laborum necessitatibus et voluptatibus iure neque sit! Exercitationem rerum debitis magni laboriosam fugiat animi amet, et nihil. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet, ipsam? Nam totam corrupti aut voluptatum incidunt odit doloribus amet repudiandae neque fuga exercitationem aliquid soluta accusantium praesentium repellendus, voluptatem minima!</p>

    @livewire('includes.content.bottom.content-bottom') 

</x-app-layout>