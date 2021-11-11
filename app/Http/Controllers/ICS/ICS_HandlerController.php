<?php

namespace App\Http\Controllers\ICS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ICS_HandlerController extends Controller
{
    public function ics_handler(Request $request){
        include 'ICS.php';

        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=Examen.ics');

        $ics = new ICS(array(
            'location' => "Mozartlaan, Zwolle",
            'description' => "Omschrijving",
            'dtstart' => '2021-11-9 9:00AM',
            'dtend' => '2021-11-9 12:00AM',
            'summary' => "Examen ingepland voor student",
            'url' => "https://deltion.nl"
        ));

        echo $ics->to_string();
    }
}
