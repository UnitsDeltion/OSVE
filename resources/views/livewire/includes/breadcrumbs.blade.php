<div class="breadcrumbs mt-20n">
    
    <?php
        if($page == 'p1'){
            $return = '<a href="/" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-home"></i> Home</a>';
        }elseif($page == 'p2'){
            $return = '<a href="/" class="a-clear fc-white"><i class="fas fa-home"></i> Home</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p2" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-graduation-cap"></i> Opleidingen</a>';
        }elseif($page == 'p3'){
            $return = '<a href="/" class="a-clear fc-white"><i class="fas fa-home"></i> Home</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p2" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Opleidingen</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p3" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-user-edit"></i> Examens</a>';
        }elseif($page == 'p4'){
            $return = '<a href="/" class="a-clear fc-white"><i class="fas fa-home"></i> Home</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p2" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Opleidingen</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p3" class="a-clear fc-white"><i class="fas fa-user-edit"></i> Examens</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p4" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-clock"></i> Examen moment</a>';
        }elseif($page == 'p5'){
            $return = '<a href="/" class="a-clear fc-white"><i class="fas fa-home"></i> Home</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p2" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Opleidingen</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p3" class="a-clear fc-white"><i class="fas fa-user-edit"></i> Examens</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p4" class="a-clear fc-white"><i class="fas fa-clock"></i> Examen moment</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/p5" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-eye"></i> Overzicht</a>';
        }else{
            $return = null;
        }

        echo $return;
    ?>
</div>