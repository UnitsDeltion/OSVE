function selectInput($page, $id){

    var input = document.getElementById($id);

    if($page == 'p2'){
        var array = document.getElementsByName('crebo_nr');
    
        array.forEach(element => {
            if(element.checked){
                Notify({
                    type: 'warning',
                    duration: 7500,
                    position: 'top center',
                    title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                    html: '<p class="align-center mb-0 fw-600 fc-primary-nh">Er kan maar <span class="fw-900 fc-secondary-nh">één</span> opleiding <br> per keer worden geselecteerd.</p>',
                });
            }
        });
    }else if($page == 'p3'){
        var array = document.getElementsByName('examen');
    
        array.forEach(element => {
            if(element.checked){
                Notify({
                    type: 'warning',
                    duration: 7500,
                    position: 'top center',
                    title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                    html: '<p class="align-center mb-0 fw-600 fc-primary-nh">Er kan maar <span class="fw-900 fc-secondary-nh">één</span> examen <br> per keer worden ingepland.</p>',
                });
            }
        });
    }

    input.checked = true;
}