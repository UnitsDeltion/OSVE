<section id="controllers">
    <h2>Controllers</h2>
    <p class="lead">Controllers zijn de schakel tussen de database models en de <a href="#views">views</a>.</p>
    <p class="lead">De onderstaande controllers zijn op de volgende manier opgebouwd: <br> Het begint met een overview van de hele controller. Vervolgens wordt er per function toegelicht hoe ze werken en wat de functie ervan is.</p>

    <div id="controllers_algemeen">
        <h3>Algemeen</h3>
        
        <div class="mb-50" id="controllers_algemeen_OSVEController">
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
                <p>Function redirect wordt gebruikt om '/P1' door te sturen naar '/'</p>
            </div>

            <div>
                <h5>Function P1</h5>
                <p>Function P1 wordt aangeroepen door de route '/P1'. In deze function worden een aantal session keys leggemaakt. Het lege van deze session keys is belagrijk voor de veiligheid. Als deze data niet zou worden verwijderd kan een student van bijvoorbeeld P1 meteen naar P5.</p>
            </div>

            <div>
                <h5>Function P2</h5>
                <p>Function p2 wordt aangeroepen door de route '/P2'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F1</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P2 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P1</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens worden alle opleidingen opgehaald en meegestuurd naar view P2.</p>
            </div>

            <div>
                <h5>Function P3</h5>
                <p>Function p3 wordt aangeroepen door de route '/P3'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F2</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P3 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P2</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens worden alle examens die gekoppeld zijn aan de gekozen opleiding opgehaald en meegestuurd naar view P3.</p>
            </div>

            <div>
                <h5>Function P4</h5>
                <p>Function p4 wordt aangeroepen door de route '/P4'. In deze function wordt eerst twee session keys vergeten. Dit doen we omdat het binnen <strong>OSVE</strong> mogelijk is om terug te gaan naar de vorige pagina. Om te voorkomen dat studenten steeds heen en weer gaan tussen pagina's moeten ze eerst alles opnieuw invullen.</p>

                <p>Vervolgens wordt er gekeken of de session data die in <code>FormHandlerController F3</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P4 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController P3</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens worden alle exaxamen momenten die gekoppeld zijn aan de gekozen examen opgehaald en meegestuurd naar view P3. Voordat dit wordt meegestuurd wordt er gekeken hoeveel afspraken er voor dit examen al zijn ingepland. Dit aantal wordt van het aantal plekken afgehaald.</p>
            </div>

            <div>
                <h5>Function P5</h5>
                <p>Function p5 wordt aangeroepen door de route '/P5'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P5 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens wordt de URL naar het examen reglementen en alle session data <small>(behalve login gegevens)</small> opgehaald en meegestuurd naar view P5.</p>
            </div>

            <div>
                <h5>Function P6</h5>
                <p>Function p6 wordt aangeroepen door de route '/P6'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P6 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens wordt het studentnummer opgehaald en meegestuurd naar view P6.</p>
            </div>
            
            <div>
                <h5>Function P8</h5>
                <p>Function p8 wordt aangeroepen door de route '/P8'.</p>

                <p>Er wordt eerst gekeken of de session data die in <code>FormHandlerController</code> wordt gezet daadwerkelijk bestaat. Deze controlle is er omdat P6 direct via de URL balk te bereiken is, de validation in <code>FormHandlerController</code> wordt op deze manier niet gebruikt. Zodra één of meerdere keys leeg zijn wordt een '403 Forbidden' foutmelding weergegeven.</p>

                <p>Vervolgens wordt een title, message en error opgehaald en meegestuurd naar view P8.</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="mt-50 mb-30" id="controllers_algemeen_ICSController">
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

        <p class="mb-0">De <code>ICSController</code> wordt gebruikt om ICS agenda afspraken te maken. De code is geschreven door <strong>JakeBellaCera</strong> op <a href="https://gist.github.com/jakebellacera/635416" target="_blank">GitHub</a>.</p>

        <pre>
            <code class="php">
<?php import('../../app/Http/Controllers/ICSController.php') ?>
            </code>
        </pre>
    </div>

    <hr>

    <div class="mt-50 mb-50" id="controllers_algemeen_FormHandlerController">
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
            <p>Function f2 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p1">view p1</a>.</p>
        </div>

        <div>
            <h5>Function f3</h5>
            <p>Function f3 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p2">view p2</a>.</p>
        </div>

        <div>
            <h5>Function f4</h5>
            <p>Function f4 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p3">view p3</a>.</p>

            <p>In deze function wordt <code>$request->examen</code> uit elkaar gehaalt doormiddel van <code>explode</code>. Dit doen we omdat dit makkelijk is voor het inplannen van examens en beter is voor de overzicht.</p>
        </div>

        <div>
            <h5>Function f5</h5>
            <p>Function f5 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p4">view p4</a>.</p>

            <p>In deze function wordt <code>$request->examenMoment</code> uit elkaar gehaalt doormiddel van <code>explode</code>. Dit doen we omdat dit makkelijk is voor het inplannen van examens en beter is voor de overzicht.</p>
        </div>

        <div>
            <h5>Function f6</h5>
            <p>Function f6 wordt aangeroepen door het <code>POST</code> formulier op <a href="#views_front-end_p5">view p6</a>.</p>

            <p>In deze function wordt het examen ingepland. Als eerste wordt het examenId en het examenMomentId opgehaald zodat de afspraak hieraan verbonden wordt. Vervolgens wordt er gegekeken of er al eenzelfde examen bestaat. Het is namelijk niet de bedoeling dat een student zich meerdere keren voor een afspraak kan inplannen. Als dit het geval is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>

            <p>Als alles inorde is wordt het examen ingepland. Hierbij wordt <code>std_bevestigd</code> en <code>doc_bevestigd</code> op 0 gezet. <code>std_bevestigd</code> is kort voor student_bevestigd en <code>doc_bevestigd</code> is kort voor docent_bevestigd.</p>

            <p>Vervolgens wordt er een token die aan het afspraak is gekoppeld aangemaakt. Deze token is eigenlijk een wachtwoord hash van het studentnummer. Om te voorkomen dat er HTML/browser parameters in de token komen te staan worden deze vervangen door een getal tussen de 0 en 9. Een token mag niet voor altijd geldig blijven, wij hebben ervoor gekozen dat een token voor <strong>24 uur</strong> geldig is. Na deze 24 uur is de token niet meer geldig en moet de student het examen opnieuw inplannen.</p>

            <p>Aansluitend wordt de token in de session gezet zodat deze in de email gebruikt kan worden als URL parameter. Als laatste wordt het studentnummer nog een keer opgehaald en meegestuurd naar <a href="#views_front-end_p8">view p8</a>.</p>
        </div>

        <div>
            <h5>Function f7</h5>
                <p>Function f7 wordt aangeroepen door de route '/p7'. </p>

                <p>In deze function wordt gecontroleert of de token die als parameter in de email staat geldig is.</p>
                
                <p>Als eerste wordt gecontroleert of de data wel in <code>$request</code> staat. Als dit niet het geval is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>
                <p>Vervolgens wordt alle token data opgehaald. Als de query leeg is wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding.</p>

                <p>Op te controleren of de token verlopen is wordt de huidige <code>Unix timestamp</code> opgehaald. De controle zelf wordt uitgevoerd door de huidige <code>Unix timestamp</code> van de token <code>Unix timestamp</code> af te trekken. Als het resultaat kleiner is dat <strong>0</strong> is de token verlopen en wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een foutmelding. Vervolgens wordt de token en het examenmoment verwijderd.</p>

                <p>Vervolgens wordt het <code>examenMoment</code> opgehaald en op actief gezet en het token wordt verwijderd. Als laatste wordt de student doorgestuurd naar <a href="#views_front-end_p8">view p8</a> met een bevestiging.<p>
        </div>
    </div>

    <hr>

    <div class="mt-50" id="controllers_beheer">
        <h3>Beheer</h3>
        
        <div class="mb-50" id="controllers_beheer_DashboardController">
            <h4>DashboardController</h4>
            <p>De <code>DashboardController</code> is voor docenten de eerste controller die gebruikt wordt zodra ze inlogd zijn.</p>

            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/beheer/DashboardBeheerController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function index</h5>
                <p>In function index(Request $request) worden de <strong>examens</strong>, <strong>opleidingen</strong> en <strong>geplandeExamens</strong> opgehaald en meegestuurd naar de view.</p>
            </div>

            <div>
                <h5>Function dtDutch</h5>
                <p>Het enige doel van deze function is het terugsturen van een Nederlandse versie van de datatabels</p>
            </div>

            <div>
                <h5>Function redirect</h5>
                <p>Het enige doel van deze function is het doorsturen van <strong>'/beheer'</strong> naar <strong>'/beheer/dashboard'</strong>.</p>
            </div>
        </div>

        <hr>

        <div class="mt-50 mb-50" id="controllers_beheer_ExamenBeheerController">
            <h4>ExamenBeheerController</h4>
            <p>De <code>ExamenBeheerController</code> maakt het voor docenten en opleidingsmangers mogelijk om examens te beheren.</p>

            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/beheer/ExamenBeheerController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function index</h5>
                <p>Deze function haalt alle examens op en stuurt ze hem door naar <a href="#views_beheer_examens">view examens index</a>.</p>
            </div>

            <div>
                <h5>Function create</h5>
                <p>Function create haalt alle opleidingen op en stuurt ze hem door naar <a href="#views_beheer_examens">view examens create</a>.</p>
            </div>

            <div>
                <h5>Function store</h5>
                <p><code>Function store</code> valideert <code>POST</code> data en zet de data in de db.</p>
            </div>

            <div>
                <h5>Function delete</h5>
                <p>Bij <code>function delete</code> wordt een popup weergegeven waarna het examen definitief verwijderd kan worden.</p>
            </div>

            <div>
                <h5>Function destroy</h5>
                <p>Bij <code>function destroy</code> wordt het examen definitief verwijderd.</p>
            </div>
        </div>

        <hr>

        <div class="mt-50 mb-50" id="controllers_beheer_ExamenMomentBeheerController">
            <h4>ExamenMomentBeheerController</h4>
            <p>De <code>ExamenMomentBeheerController</code> maakt het voor docenten en opleidingsmangers mogelijk om exameMomenten te beheren. ExeamenMomenten zijn datum en tijdstippen waarom het mogelijk is om examens af te nemen.</p>

            <pre>
                <code class="php">
<?php import('../../app/Http/Controllers/beheer/ExamenMomentBeheerController.php') ?>
                </code>
            </pre>

            <div>
                <h5>Function create</h5>
                <p>Bij <code>function create</code> worden alle examens opgehaald en doorgestuurd naar de view.</p>
            </div>

            <div>
                <h5>Function store</h5>
                <p><code>Function store</code> valideert <code>POST</code> data en zet de data in de db.</p>
            </div>

            <div>
                <h5>Function edit</h5>
                <p><code>Function edit</code> wordt het examen en het examenMoment opgehaald en doorgestuurd naar de view.</p>
            </div>

            <div>
                <h5>Function update</h5>
                <p><code>Function update</code> valideert <code>POST</code> data en zet werkt de data bij in de db.</p>
            </div>

            <div>
                <h5>Function delete</h5>
                <p>Bij <code>function delete</code> wordt een popup weergegeven waarna het examenMoment definitief verwijderd kan worden.</p>
            </div>

            <div>
                <h5>Function destroy</h5>
                <p>Bij <code>function destroy</code> wordt het examenMoment definitief verwijderd.</p>
            </div>
        </div>

    </div>
</section>