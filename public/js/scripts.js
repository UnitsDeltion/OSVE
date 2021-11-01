function selectInput($id){
    document.getElementById($id).checked = true;
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