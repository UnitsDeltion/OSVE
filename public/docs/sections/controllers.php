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
            <p class="mb-0"></p>
        </div>
    </div>

</section>