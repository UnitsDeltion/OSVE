<div>
    <div id="notify"></div>

    @if ($errors->any())
        <script>
            Notify({
                type: 'danger',
                duration: 7500,
                position: 'top center',
                title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                html: '<p class="align-center mb-0 fw-600 fc-primary-nh">Alle velden zijn verplicht!</p>',
            });
        </script>  
    @endif
</div>
