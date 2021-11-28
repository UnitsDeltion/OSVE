<section id="controllers">
    <h2>Controllers</h2>
    <p class="lead">Controllers zijn de schakel tussen de database models en de <a href="#views">views</a>.</p>
    <p class="lead">De onderstaande controllers zijn op de volgende manier opgebouwd: <br> Het begint met een overview van de hele controller. Vervolgens wordt er per function toegelicht hoe ze werken en wat de functie ervan is.</p>

    <div id="controllers_algemeen">
        <h3>Algemeen</h3>
        
        <div id="controllers_algemeen_OSVEController">
            <h4>OSVEController</h4>
            <p>De <code>OSVEController</code> is voor studenten één van de belangrijkste controllers binnen <strong>OSVE</strong>. <code>OSVEController</code> zorgt ervoor dat de <a href="#views">views</a> worden ingeladen met de juiste data.</p>
            <p class="mb-0">Elke <code>function</code> binnen deze controller heeft dezelfde naam als de view.</p>
            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/OSVEController.php') ?>
                </code>
            </pre>

            <h5>Function redirect</h5>
            <p class="mb-0">Function redirect wordt gebruikt om '/P1' door te sturen naar '/'</p>
            <pre>
                <code>
public function redirect(){
    return redirect('/');
}                   
                </code>
            </pre>

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

            <h5>Function P2</h5>
            <p>Function p2 wordt aangeroepen door de route '/P2'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

            <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F1</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P2 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P1</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

            <p class="mb-0">
                Vervolgens worden alle opleidingen opgehaald en meegestuurd naar P2.
            </p>
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

            <h5>Function P3</h5>
            <p class="mb-0"></p>
            <pre>
                <code>
                    
                </code>
            </pre>

            <h5>Function P4</h5>
            <p class="mb-0"></p>
            <pre>
                <code>
                    
                </code>
            </pre>

            <h5>Function P5</h5>
            <p class="mb-0"></p>
            <pre>
                <code>
                    
                </code>
            </pre>

            <h5>Function P6</h5>
            <p class="mb-0"></p>
            <pre>
                <code>
                    
                </code>
            </pre>

            <h5>Function P8</h5>
            <p class="mb-0"></p>
            <pre>
                <code>
                    
                </code>
            </pre>
        </div>
    </div>

</section>