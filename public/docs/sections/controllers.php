<section id="controllers">
    <h2>Controllers</h2>
    <p class="lead">Controllers zijn de schakel tussen de database models en de <a href="#views">views</a>.</p>
    <p class="lead">De onderstaande controllers zijn op de volgende manier opgebouwd: <br> Het begint met een overview van de hele controller. Vervolgens wordt er per function toegelicht hoe ze werken en wat de functie ervan is.</p>

    <div id="controllers_algemeen">
        <h3>Algemeen</h3>
        
        <div id="controllers_algemeen_OSVEController">
            <h4>OSVEController</h4>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Student</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>OSVEController</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <p>De <code>OSVEController</code> is voor studenten één van de belangrijkste controllers binnen <strong>OSVE</strong>. <code>OSVEController</code> zorgt ervoor dat de <a href="#views">views</a> worden ingeladen met de juiste data.</p>
            <p class="mb-0">Elke <code>function</code> binnen deze controller heeft dezelfde naam als de view.</p>
            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/OSVEController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function redirect</h5>
                <p class="mb-0">Function redirect wordt gebruikt om '/P1' door te sturen naar '/'</p>
                <pre>
                    <code>
public function redirect(){
    return redirect('/');
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P1</h5>
                <p class="mb-0">Function P1 wordt aangeroepen door de route '/P1'. In deze function worden een aantal session keys leggemaakt. Het lege van deze session keys is belagrijk voor de veiligheid. Als deze data niet zou worden verwijderd kan een student van bijvoorbeeld P1 meteen naar P5.</p>
                <pre>
                    <code>
public function p1(Request $request)
{
    Session::forget(['voornaam', 'achternaam', 'studentnummer', 'klas', 'faciliteitenpas', 'opleiding_id', 'crebo_nr', 'opleiding', 'vak', 'examen', 'datum', 'tijd', 'token']);

    return view("p1");
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P2</h5>
                <p>Function p2 wordt aangeroepen door de route '/P2'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F1</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P2 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P1</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens worden alle opleidingen opgehaald en meegestuurd naar view P2.</p>
                <pre>
                    <code>
public function p2(Request $request)
{
    $request->session()->forget("opleiding_id");
    $request->session()->forget("crebo_nr");
    $request->session()->forget("opleiding");

    if (
        null == $request->session()->get("voornaam") ||
        null == $request->session()->get("achternaam") ||
        null == $request->session()->get("studentnummer") ||
        null == $request->session()->get("faciliteitenpas") ||
        null == $request->session()->get("klas")
    ) {
        $request->session()->flush();
        abort_if(
            Gate::denies("user_access"),
            Response::HTTP_FORBIDDEN,
            "403 Forbidden"
        );
    }

    $opleidingen = Opleidingen::get();

    return view("p2", compact("opleidingen"));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P3</h5>
                <p>Function p3 wordt aangeroepen door de route '/P3'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F2</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P3 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P2</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens worden alle examens die gekoppeld zijn aan de gekozen opleiding opgehaald en meegestuurd naar view P3.</p>
                <pre>
                    <code>
public function p3(Request $request)
{
    $request->session()->forget("vak");
    $request->session()->forget("examen");

    if (
        null == $request->session()->get("voornaam") ||
        null == $request->session()->get("achternaam") ||
        null == $request->session()->get("studentnummer") ||
        null == $request->session()->get("faciliteitenpas") ||
        null == $request->session()->get("klas") ||
        null == $request->session()->get("crebo_nr") ||
        null == $request->session()->get("opleiding") ||
        null == $request->session()->get("opleiding_id")
    ) {
        $request->session()->flush();
        abort_if(
            Gate::denies("user_access"),
            Response::HTTP_FORBIDDEN,
            "403 Forbidden"
        );
    }
    $examens = Examen::where(
        "opleiding_id",
        $request->session()->get("opleiding_id")
    )
        ->orderBy("vak", "asc")
        ->get();

    return view("p3", compact("examens"));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P4</h5>
                <p>Function p4 wordt aangeroepen door de route '/P4'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F3</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P4 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P3</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens worden alle exaxamen momenten die gekoppeld zijn aan de gekozen examen opgehaald en meegestuurd naar view P3. Voordat dit wordt meegestuurd wordt er gekeken hoeveel afspraken er voor dit examen al zijn ingepland. Dit aantal wordt van het aantal plekken afgehaald.</p>

                <pre>
                    <code>
public function p4(Request $request)
{
    $request->session()->forget("datum");
    $request->session()->forget("tijd");

    if (
        null == $request->session()->get("voornaam") ||
        null == $request->session()->get("achternaam") ||
        null == $request->session()->get("studentnummer") ||
        null == $request->session()->get("faciliteitenpas") ||
        null == $request->session()->get("klas") ||
        null == $request->session()->get("crebo_nr") ||
        null == $request->session()->get("opleiding") ||
        null == $request->session()->get("opleiding_id") ||
        null == $request->session()->get("vak") ||
        null == $request->session()->get("examen")
    ) {
        $request->session()->flush();
        abort_if(
            Gate::denies("user_access"),
            Response::HTTP_FORBIDDEN,
            "403 Forbidden"
        );
    }

    $vak = $request->session()->get("vak");
    $examen = $request->session()->get("examen");

    //Haalt het ID van het examen op, aangezien examen en vak strings zijn.
    $examenId = Examen::where([
        "opleiding_id" => $request->session()->get("opleiding_id"),
        "vak" => $request->session()->get("vak"),
        "examen" => $request->session()->get("examen"),
    ])->first()->id;

    //Haalt alle examenmomenten op
    $examenMomenten = examenMoment::where([
            ['examenid', $examenId],
            ['plaatsen', '>=', 1]
        ])->orderBy("datum", "asc")->get();

    foreach($examenMomenten as $examenMoment){
        //Haalt het aantal plaatsen uit het examenmoment
        $plaatsen = $examenMoment->plaatsen;

        //Haalt alle geplande examens op die gekoppeld zijn aan dit examenmoment id en is bevestigd door een student
        $geplandeExamens = GeplandeExamens::where([
            ['examen', $examenMoment->examenid],
            ['std_bevestigd', '1']
        ])->get();

        //Telt het aantal records
        $plaatsenCount = count($geplandeExamens);

        //Beschikbare plaatsen = het aantal plaatsen in het moment min het aantal geplande examens
        $examenMoment->plaatsen = $examenMoment->plaatsen - $plaatsenCount;
    }

    $examenMoment = $examenMomenten;

    return view("p4")
        ->with(compact("vak"))
        ->with(compact("examen"))
        ->with(compact("examenMoment"));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P5</h5>
                <p>Function p5 wordt aangeroepen door de route '/P5'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P5 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens wordt de URL naar het examen reglementen en alle session data <small>(behalve login gegevens)</small> opgehaald en meegestuurd naar view P5.</p>
                <pre>
                    <code>
public function p5(Request $request)
{
    if (
        null == $request->session()->get("voornaam") ||
        null == $request->session()->get("achternaam") ||
        null == $request->session()->get("studentnummer") ||
        null == $request->session()->get("faciliteitenpas") ||
        null == $request->session()->get("klas") ||
        null == $request->session()->get("crebo_nr") ||
        null == $request->session()->get("opleiding") ||
        null == $request->session()->get("vak") ||
        null == $request->session()->get("examen") ||
        null == $request->session()->get("datum") ||
        null == $request->session()->get("tijd")
    ) {
        $request->session()->flush();
        abort_if(
            Gate::denies("user_access"),
            Response::HTTP_FORBIDDEN,
            "403 Forbidden"
        );
    }

    $reglementen = ReglementenBeheer::get()->first();

    $sessionData = collect(session()->all());
    $data = $sessionData->except(["_previous", "_flash", "_token"]);

    return view("p5")->with(compact("data", "reglementen"));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function P6</h5>
                <p>Function p6 wordt aangeroepen door de route '/P6'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P6 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens wordt het studentnummer opgehaald en meegestuurd naar view P6.</p>

                <pre>
                    <code>
public function p6(Request $request)
{
    if (null == $request->session()->get("studentnummer")) {
        $request->session()->flush();
    }

    $studentnummer = $request->session()->get("studentnummer");

    return view("p6")->with(compact("studentnummer"));
}
                    </code>
                </pre>
            </div>
            
            <div>
                <h5>Function P8</h5>
                <p>Function p8 wordt aangeroepen door de route '/P8'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P6 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p class="mb-0">Vervolgens wordt een title, message en error opgehaald en meegestuurd naar view P8.</p>

                <pre>
                    <code>
public function p8(Request $request)
{
    if (
        null == $request->session()->get("title") ||
        null == $request->session()->get("message")
    ) {
        $request->session()->flush();
        abort_if(
            Gate::denies("user_access"),
            Response::HTTP_FORBIDDEN,
            "403 Forbidden"
        );
    }

    $title = $request->session()->get("title");
    $message = $request->session()->get("message");

    if (null != $request->session()->get("error")) {
        $error = $request->session()->get("error");
    } else {
        $error = null;
    }

    $request->session()->flush();

    return view("p8")
        ->with(compact("title"))
        ->with(compact("message"))
        ->with(compact("error"));
}
                    </code>
                </pre>
            </div>
        </div>
    </div>

    <div id="controllers_algemeen_ICSController">
        <h4>ICSController</h4>

        <table class="table mb-25">
            <thead>
                <tr>
                    <th>Rechten</th>
                    <th>Student</th>
                    <th>Docent</th>
                    <th>Opleidingsmanagers</th>
                    <th>Ontwikkelaar</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                    <td>ICSController</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
            </tbody>
        </table>

        <p>De <code>ICSController</code> wordt gebruikt om ICS agenda afspraken te maken. De code is geschreven door <strong>JakeBellaCera</strong> op <a href="https://gist.github.com/jakebellacera/635416" target="_blank">GitHub</a>.</p>

        <pre>
            <code class="php">
<?php import('../../app/Http/Controllers/ICSController.php') ?>
            </code>
        </pre>
    </div>

    <div id="controllers_algemeen_FormHandlerController">
        <h4>FormHandlerController</h4>

        <table class="table mb-25">
            <thead>
                <tr>
                    <th>Rechten</th>
                    <th>Student</th>
                    <th>Docent</th>
                    <th>Opleidingsmanagers</th>
                    <th>Ontwikkelaar</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                    <td>ICSController</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
            </tbody>
        </table>

        <p>De <code>FormHandlerController</code> is voor studenten één van de belangrijkste controllers binnen <strong>OSVE</strong>. <code>FormHandlerController</code> zorgt ervoor dat de juiste data voor de <a href="#views">views</a> beschikbaar is. De eerste function zijn eenvoudig, ze valideren form data en zetten het in de session. Latere functions zijn inhoudelijk erg complex.</p>

        <pre>
            <code class="php">
<?php import('../../app/Http/Controllers/FormHandlerController.php') ?>
            </code>
        </pre>

        <div>
            <h5>Function f2</h5>
                <p class="mb-0">Function f2 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p1">view p1</a>.</p>
                <pre>
                    <code>
public function f2(Request $request)
{
    $request->validate([
        "voornaam" => "required|max:255|string",
        "achternaam" => "required|max:255|string",
        "studentnummer" => "required|max:9|string",
        "klas" => "required|max:9|string",
        "faciliteitenpas" => "required|max:3",
    ]);

    $request->session()->put("voornaam", $request->voornaam);
    $request->session()->put("achternaam", $request->achternaam);
    $request->session()->put("studentnummer", $request->studentnummer);
    $request->session()->put("klas", $request->klas);
    $request->session()->put("faciliteitenpas", $request->faciliteitenpas);

    return redirect("p2");
}
                </code>
            </pre>
        </div>

        <div>
            <h5>Function f3</h5>
                <p class="mb-0">Function f3 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p2">view p2</a>.</p>
                <pre>
                    <code>
public function f3(Request $request)
{
    $request->validate(
        ["opleiding_id" => "required|max:5|string"],
        ["opleiding_id.required" => "Het opleidingen veld is verplicht!"]
    );

    $opleiding = Opleidingen::where("id", $request->opleiding_id)->first();

    $request->session()->put("opleiding_id", $request->opleiding_id);
    $request->session()->put("crebo_nr", $opleiding->crebo_nr);
    $request->session()->put("opleiding", $opleiding->opleiding);

    return redirect("p3");
}
                </code>
            </pre>
        </div>

        <div>
            <h5>Function f4</h5>
                <p>Function f4 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p3">view p3</a>.</p>

                <p class="mb-0">In deze function wordt <code>$request->examen</code> uit elkaar gehaalt doormiddel van <code>explode</code>. Dit doen we omdat dit makkelijk is voor het inplannen van examens en beter is voor de overzicht.</p>
                <pre>
                    <code>
public function f4(Request $request)
{
    $request->validate([
        "examen" => "required|max:255|string",
    ]);

    $data = explode(" - ", $request->examen);

    $request->session()->put("vak", $data[0]);
    $request->session()->put("examen", $data[1]);

    return redirect("p4");
}
                </code>
            </pre>
        </div>

        <div>
            <h5>Function f5</h5>
                <p>Function f5 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p4">view p4</a>.</p>

                <p class="mb-0">In deze function wordt <code>$request->examenMoment</code> uit elkaar gehaalt doormiddel van <code>explode</code>. Dit doen we omdat dit makkelijk is voor het inplannen van examens en beter is voor de overzicht.</p>
                <pre>
                    <code>
public function f5(Request $request)
{
    $request->validate([
        "examenMoment" => "required|max:255|string",
    ]);

    $data = explode(" - ", $request->examenMoment);

    $request->session()->put("datum", $data[0]);
    $request->session()->put("tijd", $data[1]);

    return redirect("p5");
}
                </code>
            </pre>
        </div>

        <div>
            <h5>Function f6</h5>
                <p>Function f6 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p5">view p6</a>.</p>

                <p>In deze function wordt het examen ingepland. Als eerste wordt het examenId en het examenMomentId opgehaald zodat de afspraak hieraan verbonden wordt. Vervolgens wordt er gegekeken of er al eenzelfde examen bestaat. Het is namelijk niet de bedoeling dat een student zich meerdere keren voor een afspraak kan inplannen. Als dit het geval is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>

                <p>Als alles inorde is wordt het examen ingepland. Hierbij wordt <code>std_bevestigd</code> en <code>doc_bevestigd</code> op 0 gezet. <code>std_bevestigd</code> is kort voor student_bevestigd en <code>doc_bevestigd</code> is kort voor docent_bevestigd.</p>

                <p>Vervolgens wordt er een token die aan het afspraak is gekoppeld aangemaakt. Deze token is eigenlijk een wachtwoord hash van het studentnummer. Om te voorkomen dat er HTML/browser parameters in de token komen te staan worden deze vervangen door een getal tussen de 0 en 9. Een token mag niet voor altijd geldig blijven, wij hebben ervoor gekozen dat een token voor <strong>24 uur</strong> geldig is. Na deze 24 uur is de token niet meer geldig en moet de student het examen opnieuw inplannen.</p>

                <p>Aansluitend wordt de token in de session gezet zodat deze in de email gebruikt kan worden als URL parameter. Als laatste wordt het studentnummer nog een keer opgehaald en meegestuurd naar <a href="#views_front-end_p8">view p8</a>.</p>
                <pre>
                    <code>
public function f6(Request $request)
{
    //Haalt examen id op voor relatie
    $examenId = Examen::where([
        "opleiding_id" => $request->session()->get("opleiding_id"),
        "vak" => $request->session()->get("vak"),
        "examen" => $request->session()->get("examen"),
    ])->first()->id;

    //Haalt examen moment id op voor relatie
    $examenMomentId = ExamenMoment::where([
        "examenid" => $examenId,
        "datum" => $request->session()->get("datum"),
        "tijd" => $request->session()->get("tijd"),
    ])->first()->id;

    $studentnummer = $request->session()->get("studentnummer");

    //Controleert of er al een examen met zelfde gegevens bestaat, zoja; stuurt door naar p8 met error
    $examenCheck = GeplandeExamens::where([
        "studentnummer" => $request->session()->get("studentnummer"),
        "examen" => $examenId,
        "examen_moment" => $examenMomentId,
    ])->exists();

    if ($examenCheck) {
        $request->session()->put("title", "Examen al ingepland");
        $request
            ->session()
            ->put(
                "message",
                "Het is niet mogelijk vaker voor hetzelfde examen in te plannen. Probeer het opnieuw of neem contact op met je docent."
            );
        $request->session()->put("error", "Err: dubbele data.");
        return redirect("p8");
    }

    //Plant examen in
    $gepland_examen_id = GeplandeExamens::create([
        "voornaam" => $request->session()->get("voornaam"),
        "achternaam" => $request->session()->get("achternaam"),
        "faciliteitenpas" => $request->session()->get("faciliteitenpas"),
        "studentnummer" => $studentnummer,
        "klas" => $request->session()->get("klas"),
        "opleiding_id" => $request->session()->get("opleiding_id"),
        "examen" => $examenId,
        "examen_moment" => $examenMomentId,
        "std_bevestigd" => 0,
        "doc_bevestigd" => 0,
    ])->id;

    //Tijd/datum wanneer token is gemaakt
    $cre_date = time();
    //Tijd/datum wanneer token verloopt
    $exp_date = strtotime("+1 day", $cre_date);

    //Maakt token voor bevestiging
    $token = Hash::make($studentnummer);
    //Vervang ongeldige karakters in token door random nummer
    $token = str_replace(
        [":", "\\", "/", "*", "@", "&", "?", "."],
        rand(0, 9),
        $token
    );

    //Maakt token db row aan
    GeplandeExamensTokens::create([
        "gepland_examen_id" => $gepland_examen_id,
        "token" => $token,
        "exp_date" => $exp_date,
    ]);
    
    //Zet token in sessie voor de email view
    $request->session()->put("token", $token);
    \Mail::to($studentnummer . "@st.deltion.nl")->send(
        new \App\Mail\examenInplannen()
    );

    //Zet data in sessie voor p6 pagina
    $request->session()->put("studentnummer", $studentnummer);

    return redirect("p6");
}
                </code>
            </pre>
        </div>

        <div>
            <h5>Function f7</h5>
                <p>Function f7 wordt aangeroepen door de route '/p7'. </p>

                <p>In deze function wordt gecontroleert of de token die als parameter in de email staat geldig is.</p>
                
                <p>Als eerste wordt gecontroleert of de data wel in <code>$request</code> staat. Als dit niet het geval is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>
                <p>Vervolgens wordt alle token data opgehaald. Als de query leeg is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>

                <p>Op te controleren of de token verlopen is wordt de huidige <code>Unix timestamp</code> opgehaald. De controle zelf wordt uitgevoerd door de huidige <code>Unix timestamp</code> van de token <code>Unix timestamp</code> af te trekken. Als het resultaat kleiner is dat <strong>0</strong> is de token verlopen en wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding. Vervolgens wordt de token en het examenmoment verwijderd.</p>

                <p class="mb-0">Vervolgens wordt het <code>examenMoment</code> opgehaald en op actief gezet en het token wordt verwijderd. Als laatste wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een bevestiging.<p>

                <pre>
                    <code>
public function f7(Request $request)
{
    if (null == $request->token) {
        $request->session()->put("title", "Ongeldige token");
        $request
            ->session()
            ->put(
                "message",
                "Probeer het opnieuw of neem contact op met je docent."
            );
        $request->session()->put("error", "Err: request/parameter leeg.");
        return redirect("p8");
    }

    //Haalt de token data op basis van de token
    $tokenData = GeplandeExamensTokens::where(
        "token",
        $request->token
    )->first();

    //Als query leeg is laat error zien
    if (!isset($tokenData)) {
        $request->session()->put("title", "Ongeldige token");
        $request
            ->session()
            ->put(
                "message",
                "Probeer het opnieuw of neem contact op met je docent."
            );
        $request->session()->put("error", "Err: invalid_token/not found.");
        return redirect("p8");
    }

    //Verloop datum
    $exp_date = $tokenData["exp_date"];
    //Hudige datum
    $crt_date = time();

    //Token verschil = token verlopen tijd - huidige tijd
    $dateDiff = $exp_date - $crt_date;

    //Als het verschil in de min staat is de token verlopen en laat error zien
    if ($dateDiff < 0) {
        $request->session()->put("title", "Ongeldige token");
        $request
            ->session()
            ->put(
                "message",
                "De tijd om het examen te bevestigen is verlopen. Probeer het opnieuw of neem contact op met je docent."
            );
        $request->session()->put("error", "Err: token verlopen.");

        $tokenData->delete();

        $examen = GeplandeExamens::where(
            "id",
            $tokenData->gepland_examen_id
        )->first();
        $examen->delete();

        return redirect("p8");
    }

    //Haalt het geplande examen op, op basis van het id uit de token
    $geplandExamen = GeplandeExamens::where(
        "id",
        $tokenData->gepland_examen_id
    )->first();

    //Als query leeg is laat error zien
    if (!isset($geplandExamen)) {
        $request->session()->put("title", "Ongeldige token");
        $request
            ->session()
            ->put(
                "message",
                "Probeer het opnieuw of neem contact op met je docent."
            );
        $request
            ->session()
            ->put("error", "Err: geen ingepland examen gevonden.");
        return redirect("p8");
    }

    //Zet examen op actief en sla het op
    $geplandExamen->std_bevestigd = 1;
    $geplandExamen->save();

    //Verwijderd de token uit de db
    $tokenData->delete();

    $request->session()->put("title", "Examen ingepland");
    $request
        ->session()
        ->put(
            "message",
            "Voordat het examen definitief is ingepland moet deze nog worden goedgekeurd door een docent. Zodra dit is gebeurt ontvang je een bevestiging."
        );
    return redirect("p8");
}
                </code>
            </pre>
        </div>
    </div>

    <div id="controllers_beheer">
        <h3>Beheer</h3>
        
        <div id="controllers_beheer_DashboardController">
            <h4>DashboardController</h4>
            <p>De <code>DashboardController</code> is voor docenten de eerste controller die gebruikt wordt zodra ze inlogd zijn.</p>

            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/beheer/DashboardBeheerController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function index</h5>
                <p class="mb-0">In <code>function index(Request $request)</code> worden de <strong>examens</strong>, <strong>opleidingen</strong> en <strong>geplandeExamens</strong> opgehaald en meegestuurd naar de view.</p>

                <pre>
                    <code>
public function index(Request $request)
{
    $user = \Auth::user();
    if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

    $examens = Examen::all();
    $examenMomenten = ExamenMoment::orderBy('examenid', 'asc')->get();
    $users = User::all();

    foreach($examens as $examen){
        //Vervang de email die in het examen staat door de voor en achternaam
        foreach($users as $user){
            if($examen->geplande_docenten == $user->email){
                $examen->geplande_docenten = $user->voornaam . " " . $user->achternaam;
            }
        }

        //Lege data array die wordt gevuld met de eerste en de laatste examen moment datum.
        //Op deze manier kan er op het dashboard gefiltert worden
        $data = array();

        foreach($examenMomenten as $examenMoment){
            //Voor elk examen moment dat bij het examen id hoort
            if($examenMoment->examenid == $examen->id){
                //zet het examenmoment in de $data array
                array_push($data, $examenMoment->toArray());
            }
        }

        //Als data in de data array zit
        if($data){
            //Soort de array op basis van datum
            $sortedArr = collect($data)->sortBy('datum')->all();

            //Zet de eerste waarde van de array als startdatum
            $startDatum = current($sortedArr);

            //Zet de laatste waarde van de array als einddatum
            $eindDatum = end($sortedArr);

            $examen->startDatum = $startDatum['datum'];
            $examen->eindDatum = $eindDatum['datum'];
        }else{
            //Als er geen examen momenten zijn gevonden bij een examen zet er dan NB van niet beschikbaar in
            $examen->startDatum = 'NB';
            $examen->eindDatum = 'NB';
        }
    }

    $opleidingen = Opleidingen::all();
    $geplandeExamens = GeplandeExamens::all();
    
    //Vervangt gepland_examen, datum en tijd door het examen / examenmoment tijd
    foreach($geplandeExamens as $geplandExamen){
        $examen = Examen::where('id', $geplandExamen->examen)->first();
        $examenMoment = ExamenMoment::where('id', $geplandExamen->examen_moment)->first();

        $geplandExamen->gepland_examen = $examen->examen;
        $geplandExamen->datum = $examenMoment->datum;
        $geplandExamen->tijd = $examenMoment->tijd;
    }

    return view('beheer.dashboard.index')
        ->with(compact('examens'))
        ->with(compact('opleidingen'))
        ->with(compact('geplandeExamens'));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function dtDutch</h5>
                <p class="mb-0">Het enige doel van deze function is het terugsturen van een Nederlandse versie van de datatabels</p>
                
                <pre>
                    <code>
public function dtDutch(){
    return response()->file(resource_path('/json/datatabels/dutch.json'));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function redirect</h5>
                <p class="mb-0">Het enige doel van deze function is het doorsturen van <strong>'/beheer'</strong> naar <strong>'/beheer/dashboard'</strong>.</p>

                <pre>
                    <code>
public function redirect(){
    return redirect('/beheer/dashboard');
}
                    </code>
                </pre>
            </div>
        </div>

        <div id="controllers_beheer_ExamenBeheerController">
            <h4>ExamenBeheerController</h4>
            <p>De <code>ExamenBeheerController</code> maakt het voor docenten en opleidingsmangers mogelijk om examens en examenmomenten te beheren.</p>

            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/beheer/ExamenBeheerController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function index</h5>
                <p>Deze function haalt alle examens op en stuurt ze hem door naar <a href="#views_beheer_examens">view examens index</a>.</p>

                <pre>
                    <code>
public function index()
{
    $user = \Auth::user();
    if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

    $bouncer = Bouncer::is($user)->a('opleidingsmanager');
    if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}
    
    $examens = (new Examen())->with( 'examen_moments')->get()->toArray();

    return view('beheer.examens.index')->with(compact('examens'));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function create</h5>
                <p><code>Function create</code> haalt alle opleidingen op en stuurt ze hem door naar <a href="#views_beheer_examens">view examens create</a>.</p>

                <pre>
                    <code>
public function create()
{
    $user = \Auth::user();
    if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

    $bouncer = Bouncer::is($user)->a('opleidingsmanager');
    if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

    $opleidingen = Opleidingen::all();

    return view('beheer.opleidingen.index', compact('opleidingen'));
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function store</h5>
                <p><code>Function store</code> valideert <code>POST</code> data en zet de data in de db.</p>

                <pre>
                    <code>
public function store(Request $request, Examen $examen, ExamenMoment $moment)
{
    $this->validate($request, [
        'vak' => 'required',
        'examen' => 'required',
        'opleiding_id' => 'required|integer',
        'geplande_docenten' => 'required',
        'examen_opgeven_begin' => 'required',
        'examen_opgeven_eind' => 'required',
    ]);

    $examen->vak = $request->vak;
    $examen->examen = $request->examen;
    $examen->opleiding_id = $request->opleiding_id;
    $examen->geplande_docenten = $request->geplande_docenten;
    $examen->examen_opgeven_begin = $request->examen_opgeven_begin;
    $examen->examen_opgeven_eind = $request->examen_opgeven_eind;
    $examen->uitleg = $request->uitleg;
    $examen->save();
    
    return redirect()->route('examens.index')->with('success','Examen toegevoegd.');
}
                    </code>
                </pre>
            </div>

            <div>
                <h5>Function show</h5>
                <p><code>Function show</code> haalt een individueel examen op een stuurt het mee naar de view.</p>

                <pre>
                    <code>
                        
                    </code>
                </pre>
            </div>

        </div>
    </div>

</section>