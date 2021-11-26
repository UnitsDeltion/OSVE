<section id="views">
    <h2>Views</h2>
    <p class="lead">Elke view maak gebruik van een standaard layout en een aantal <a target="_blank" rel="noopener" href="https://laravel-livewire.com/docs/2.x/making-components">Livewire components</a>. Livewire components zijn stukken code die in elk bestand hergebruikt kunnen worden. Het voordeel van componenten is dat je geen herhalende code hebt.</p>

    <div id="views_layout">
        <h3>Layout</h3>
        <pre>
            <code class="html">
<?php import('../../resources/views/layouts/app.blade.php') ?>
            </code>
        </pre>  
    </div>

    <div id="views_components">
        <h3>Components</h3>
        <p class="lead">Binnen OSVE maken wij gebruik van een aantal Livewire components. Een aantal voorbeelden hiervan zijn: <i>de footer</i>, <i>het navigatiemenu</i> maar ook de <i>content divs</i>. Het makkelijke aan componets is dat je met één bestand de opmaak van veel pagina's kan wijzigen. Components zijn te vergelijken met een layout, maar dan opgesplitst in kleinere delen.</p>

        <div id="view_components_validation">
            <h4>Validation</h4>
            <p>Elke pagina waar een gebruiker iets op kan doen heeft input validation nodig. Binnen <strong>OSVE</strong> maken wij gebruik van <code>Notify</code>. <code>Notify</code> is een JavaScript plugin die het makkelijk maakt om modal meldingen te laten zien.</p>

            <h5>Modal</h5>
            <p class="mb-0">De modal wordt geopend als <code>$errors</code> bestaat. Mocht dat zo zijn wordt <code>Notify</code> gebruikt om een algemeen bericht weergegeven.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/validation/warning.blade.php') ?>
                </code>
            </pre>

            <h5>Input</h5>
            <p class="mb-0">Om aan de gebruiker duidelijk te maken om welk input veld het gaat worden er twee css clases toegevoegd. De eerste <code>bc-red</code> zorgt voor een rode border. <code>sh-red</code> zorgt voor een rode box shadow. Zoals in de <a href="#views_front-end">front-end</a> views te zien is, word er ook een parameter meegegeven. Dit parameter wordt binnen JavaScript gebruikt om de juiste input aan te roepen. Dit parameter is ook gelijk aan het <code>id</code> van het input veld.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/validation/input.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_components_content">
            <h4>Content</h4>
            <p>Content componets worden op elke pagina gebruikt. Binnen OSVE zijn er 5 verschillende content components. Het enige verschil tussen deze components is de <code>col-md-</code> class op regel zes. De <code>col-md-</code> geeft aan hoe breed de content <code>div</code> mag zijn. <small>Lees <a target="_blank" rel="noopener" href="https://getbootstrap.com/docs/5.0/layout/columns/">hier</a> meer over bootstrap colomns.</small></p>
            
            <h5>X-Small</h5>
            <p class="mb-0">X-Small wordt op dit moment in <u>geen</u> view gebruikt. De component bestaat alleen in het geval dat hij ooit nodig zou zijn.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/top/content-x-small-top.blade.php') ?>
                </code>
            </pre>
            
            <h5>Small</h5>
            <p class="mb-0">Small wordt op bevestiging- en waarschuwing pagina's zoals <code>P7</code> en <code>P9</code> gebruikt.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/top/content-small-top.blade.php') ?>
                </code>
            </pre>
            
            <h5>Normal</h5>
            <p class="mb-0">Normal wordt op alle normale content pagina's gebruikt. Normal is een goede combinatie aan content en witruimte.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/top/content-normal-top.blade.php') ?>
                </code>
            </pre>
            
            <h5>Wide</h5>
            <p class="mb-0">Wide wordt op een aantal pagina's met veel content gebruikt, het is breeder dan Normal maar smaller dan Full.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/top/content-wide-top.blade.php') ?>
                </code>
            </pre>
            
            <h5>Full</h5>
            <p class="mb-0">Wide wordt net zoals X-Small op dit moment in <u>geen</u> view gebruikt. De component bestaat alleen in het geval dat hij ooit nodig zou zijn.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/top/content-wide-top.blade.php') ?>
                </code>
            </pre>

            <p class="mb-30">In alle components worden <code>zeven</code> html <code>divs</code> geopend. Deze moeten natuurlijk ook ergens gesloten worden. Hiervoor hebben we een <code>content-bottom</code> component. Een eis van Livewire is dat elke Livewire component begint met een <code>div</code>, daarom wordt er eerst één <code>div</code> geopend met alle sluitings <code>divs</code> erin.</p>

            <h5>Content bottem</h5>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/content/bottom/content-bottom.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_components_footer">
            <h4>Footer</h4>
            <p class="lead">Elke site heeft een footer nodig. Omdat deze site in opdracht van het Deltion College is gemaakt, maken wij gebruik van de <a target="_blank" rel="noopener" href="http://www.deltion.nl">deltion.nl</a> footer.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/livewire/includes/footer-wide.blade.php') ?>
                </code>
            </pre>
        </div>
    </div>

    <div id="views_rechten">
        <h3>Rechten</h3>
        <p>Binnen <strong>OSVE</strong> maken wij gebruik van RBA <small>role based access</small>. Voor RBA maken wij gebruik van <code>Bouncer</code>. Onderstaand is een overzicht te zien van de rollen en hun permissions. Een gedeelte van deze tabel wordt in elk komend onderdeel getoond voor een beter overzicht.</p>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Rechten</th>
                    <th>Docent</th>
                    <th>Opleidingsmanagers</th>
                    <th>Ontwikkelaar</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                    <td>Dashboard</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>User beheer</td>
                    <td><i class="fas fa-times fc-red"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>Reglementen update</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>Examen beheer</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>Examen moment beheer</td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>Opleidingen beheer</td>
                    <td><i class="fas fa-times fc-red"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                </tr>
                <tr>
                    <td>Documentatie</td>
                    <td><i class="fas fa-times fc-red"></i></td>
                    <td><i class="fas fa-times fc-red"></i></td>
                    <td><i class="fas fa-check fc-green"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="views_front-end">
        <h3>Front-end</h3>
        <p class="lead">De front-end views alleen zichtbaar voor normale bezoekers.</p>
    
        <div id="views_front-end_p1">
            <h4>P1</h4>
            <p class="mb-0">P1 is de eerste pagina die een gebruiken te zien krijgt. Op deze pagina moet de <strong>voornaam</strong>, <strong>achternaam</strong>, <strong>studentnummer</strong> en <strong>klas</strong> worden ingevult.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p1.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p2">
            <h4>P2</h4>
            <p class="mb-0">Op P2 moet de student een opleiding kiezen. </p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p2.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p3">
            <h4>P3</h4>
            <p class="mb-0">Op P3 moet de student het gewenste examen kiezen. </p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p3.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p4">
            <h4>P4</h4>
            <p class="mb-0">Op P4 moet de student het gewenste examen moment kiezen. Een examen moment is een datum en tijdstip waarom het examen gehouden wordt.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p4.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p5">
            <h4>P5</h4>
            <p class="mb-0">P5 is de laatste pagina waarop de student een overzicht krijgt van alle informatie. Zodra er op 'Verder' wordt geklikt gaan we verder met het bevestigen en inplannen van het examen.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p5.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p6">
            <h4>P6</h4>
            <p class="mb-0">Op P6 krijgt de student een bevestiging dat het examen is ingepland maar nog moet worden bevestigd door zowel de student als een docent. Er is ook een mogelijheid om een <code>ICS</code> bestand te downloadeden.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p6.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_front-end_p8">
            <h4>P8</h4>
            <p class="mb-0">Op P8 krijgt de student een melding te zien. Deze melding wordt in de controler opgebouwd.</p>
            <pre>
                <code class="html">
<?php import('../../resources/views/p8.blade.php') ?>
                </code>
            </pre>
        </div>
    </div>

    <div id="views_beheer">
        <h3>Beheer</h3>
        <p class="lead">De beheer views zijn alleen zichtbaar voor docenten en Opleidingsmanagers.</p>
    
        <div id="views_beheer_dashboard">
            <h4>Dashboard</h4>
            <p>Op het dashboard wordt een overzicht van verschillende tabellen getoond. Om deze pagina overzichterlijk te maken maken wij gebruik van een custom <code>JavaScript function</code>, zie <a href="#javascript">JS Scripts</a> voor meer informatie. Om de tabellen mooi te maken maken wij gebruik <code>jQuery DataTabes</code>.</p>

            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>Dashboard</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <pre>
                <code class="html">
<?php import('../../resources/views/beheer/dashboard/index.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_beheer_users">
            <h4>User beheer</h4>
            <p>Binnen <strong>OSVE</strong> is het voor docenten en Opleidingsmanagers mogelijk om in te loggen. Beide rollen hebben hun eigen rechten <small>(zie onderstaande tabel)</small>. Om gebruikers aan te maken moet er een CRUD systeem aanwezig zijn. In <code>UsersBeheerController</code> wordt dit verder toegelicht.</p>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>User beheer</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mb-0-r">Index</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/users/index.blade.php') ?>
                </code>
            </pre>

            <h5>Create</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/users/create.blade.php') ?>
                </code>
            </pre>

            <h5>Edit</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/users/edit.blade.php') ?>
                </code>
            </pre>

            <h5>Delete</h5>
            <p class="mb-0">De delete pagina wordt weergegeven als een popup op de index pagina.</p>
            <pre>
                <code>
<?php import('../../resources/views/beheer/users/delete.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_beheer_reglementen">
            <h4>Reglementen</h4>
            <p>Op P5 staat een link naar de Deltion examen reglementen. Deze reglementen kunnen in de toekomst bijgewerkt worden. Om dit voor de opleidingsmanager makkelijk te maken hoeven zij alleen de URL naar de PDF bij te werken.</p>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>Reglementen</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mb-0-r">Edit</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/reglementen/index.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_beheer_examens">
            <h4>Examens beheer</h4>
            <p>Docenten en opleidingsmanagers kunnen examens beheren.</p>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>Examens beheer</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mb-0-r">Index</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/examens/index.blade.php') ?>
                </code>
            </pre>

            <h5>Show</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/examens/show.blade.php') ?>
                </code>
            </pre>

            <h5>Create</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/examens/create.blade.php') ?>
                </code>
            </pre>

            <h5>Edit</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/examens/edit.blade.php') ?>
                </code>
            </pre>

            <h5>Delete</h5>
            <p class="mb-0">De delete pagina wordt weergegeven als een popup op de index en show paginas.</p>
            <pre>
                <code>
<?php import('../../resources/views/beheer/examens/delete.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_beheer_examen_moment">
            <h4>Examen moment beheer</h4>
            <p>Een examen kan op verschillende momenten gehouden worden. Dit noemen wij een <i>examen moment</i>. Elke examen moment heeft een <strong>datum</strong>, <strong>tijd</strong> en een limiet aan <strong>plaatsen</strong>.</p>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>Examen moment beheer</td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mb-0-r">Create</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/moments/create.blade.php') ?>
                </code>
            </pre>

            <h5>Edit</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/moments/edit.blade.php') ?>
                </code>
            </pre>

            <h5>Delete</h5>
            <p class="mb-0">De delete pagina wordt weergegeven als een popup op de index en show paginas.</p>
            <pre>
                <code>
<?php import('../../resources/views/beheer/moments/delete.blade.php') ?>
                </code>
            </pre>
        </div>

        <div id="views_beheer_opleidingen">
            <h4>Opleidingen beheer</h4>
            <p></p>

            <table class="table mb-25">
                <thead>
                    <tr>
                        <th>Rechten</th>
                        <th>Docent</th>
                        <th>Opleidingsmanagers</th>
                        <th>Ontwikkelaar</th>
                    </tr>
                <thead>
                <tbody>
                    <tr>
                        <td>Opleidingen beheer</td>
                        <td><i class="fas fa-times fc-red"></i></td>
                        <td><i class="fas fa-check fc-green"></i></td>
                        <td><i class="fas fa-times fc-red"></i></td>
                    </tr>
                </tbody>
            </table>

            <h5 class="mb-0-r">Index</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/opleidingen/index.blade.php') ?>
                </code>
            </pre>

            <h5>Create</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/opleidingen/create.blade.php') ?>
                </code>
            </pre>

            <h5>Edit</h5>
            <pre>
                <code>
<?php import('../../resources/views/beheer/opleidingen/edit.blade.php') ?>
                </code>
            </pre>

            <h5>Delete</h5>
            <p class="mb-0">De delete pagina wordt weergegeven als een popup op de index en show paginas.</p>
            <pre>
                <code>
<?php import('../../resources/views/beheer/opleidingen/delete.blade.php') ?>
                </code>
            </pre>
        </div>
    </div>
</section>