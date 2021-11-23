function selectInput($page, $id, $optioneel){
    var input = document.getElementById($id);

    if($page == 'p2'){
        var array = document.getElementsByName('opleiding_id');
    
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
    }else if($page == 'p4'){
    var array = document.getElementsByName('examenMoment');

    array.forEach(element => {
        if(element.checked){
            Notify({
                type: 'warning',
                duration: 7500,
                position: 'top center',
                title: '<p class="align-center fc-secondary-nh mb-0">OSVE | Deltion College</p>',
                html: '<p class="align-center mb-0 fw-600 fc-primary-nh">Er kan maar <span class="fw-900 fc-secondary-nh">één</span> examen moment <br> per keer worden ingepland.</p>',
            });
        }
    });
}else if($page == 'dashboard') {
    var input = document.getElementById('examenBevestigen');
    var value = document.getElementById($optioneel)
        
    console.log(value);    

}





    input.checked = true;
}

function pagination($elementID){
    $elOne = document.getElementById("elementOne");
    $elTwo = document.getElementById("elementTwo");
    $elThree = document.getElementById("elementThree");

    $pagButOne = document.getElementById("pagButtonOne");
    $pagButTwo = document.getElementById("pagButtonTwo");
    $pagButThree = document.getElementById("pagButtonThree");

    if($elementID == "1"){
        $elOne.style.display = "block";
        $elTwo.style.display = "none";
        $elThree.style.display = "none";
        $pagButOne.classList.add("activePage");
        $pagButTwo.classList.remove("activePage");
        $pagButThree.classList.remove("activePage");
    }else if($elementID == "2"){
        $elOne.style.display = "none";
        $elTwo.style.display = "block";
        $elThree.style.display = "none";
        $pagButOne.classList.remove("activePage");
        $pagButTwo.classList.add("activePage");
        $pagButThree.classList.remove("activePage");
    }else if($elementID == "3"){
        $elOne.style.display = "none";
        $elTwo.style.display = "none";
        $elThree.style.display = "block";
        $pagButOne.classList.remove("activePage");
        $pagButTwo.classList.remove("activePage");
        $pagButThree.classList.add("activePage");
    }
} 

