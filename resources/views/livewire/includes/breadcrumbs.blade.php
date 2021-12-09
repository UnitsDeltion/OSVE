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
        }elseif($page == 'dashboard.index'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-home"></i> Dashboard</a>';
        }elseif($page == 'examens.index'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
        }elseif($page == 'examens.edit'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . url()->previous() . ' " class="a-clear fc-white"><i class="fas fa-eye"></i> Examen bekijken</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-edit"></i> Examen bewerken</a>';
        }elseif($page == 'examens.create'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens/create" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-plus"></i> Examen aanmaken</a>';
        }elseif($page == 'examens.show'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/' . request()->path() . ' " class="a-clear fc-white breadcrumbs-active"><i class="fas fa-eye"></i> Examen bekijken</a>';
        }elseif($page == 'moments.edit'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . url()->previous() . ' " class="a-clear fc-white"><i class="fas fa-eye"></i> Examen bekijken</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-edit"></i> Moment bewerken</a>';
        }elseif($page == 'momentsCreate'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/examens" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Examens beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . url()->previous() . ' " class="a-clear fc-white"><i class="fas fa-eye"></i> Examen bekijken</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-edit"></i> Moment toevoegen</a>';
        }elseif($page == 'opleidingen.index'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/opleidingen" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-graduation-cap"></i> Opleidingen beheer</a>';
        }elseif($page == 'opleidingen.edit'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/opleidingen" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Opleidingen beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-edit"></i> Opleiding bewerken</a>';
        }elseif($page == 'opleidingen.create'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/opleidingen" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Opleidingen beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-plus"></i> Opleiding toevoegen</a>';
        }elseif($page == 'users.index'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/users" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-graduation-cap"></i> Gebruikers beheer</a>';
        }elseif($page == 'users.edit'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/users" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Gebruikers beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-edit"></i> Gebruiker bewerken</a>';
        }elseif($page == 'users.create'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/users" class="a-clear fc-white"><i class="fas fa-graduation-cap"></i> Gebruikers beheer</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="' . Request::url() . '" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-plus"></i> Gebruiker toevoegen</a>';
        }elseif($page == 'reglementen.index'){
            $return = '<a href="/beheer/dashboard" class="a-clear fc-white"><i class="fas fa-home"></i> Dashboard</a>';
            $return .= '<i class="fas fa-angle-right ml-2 mr-2"></i> <a href="/beheer/reglementen" class="a-clear fc-white breadcrumbs-active"><i class="fas fa-graduation-cap"></i> Reglementen beheer</a>';
        }else{
            $return = null;
        }

        var_dump($page);

        echo $return;
    ?>
</div>