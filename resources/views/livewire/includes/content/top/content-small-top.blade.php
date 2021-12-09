<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <?php
        $route = Route::current();
        $name = $route->getName();
    ?>

    @livewire('includes.breadcrumbs', ['page' => $name])
    
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="content">