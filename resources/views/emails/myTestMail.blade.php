<!--- Omdat verschillende mail applicaties geen CSS Ondersteunen moeten wij het inlinen. Eerst wordt het normaal gebouwd en
 als het dan klaar is gebruiken wij de inliner op:  https://putsmail.com/inliner  --->

 <!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Osve | Deltion college</title>
    <style>
        * {
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6em;
            margin: 0;
            padding: 0;
        }

        body {
            -webkit-font-smoothing: antialiased;
            height: 100%;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }

        a {
            color: #F58220;
        }

        table.body-wrap {
            padding: 20px;
            width: 100%;
        }
        table.body-wrap .container {
            border: 1px solid #f0f0f0;
        }

        table.footer-wrap {
            clear: both !important;
            width: 100%;
        }
        .footer-wrap .container p {
            color: #666666;
            font-size: 12px;
        }
        table.footer-wrap a {
            color: #999999;
        }

        h1,
        h2,
        h3 {
            color: #111111;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: 500;
            line-height: 1.5em;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        h1 {
            font-size: 28px;
            padding: 20px;
            color: #343469;
        }
        h2 {
            font-size: 22px;
            color: #343469;
        }
        h3 {
            font-size: 22px;
            color: #343469;
        }

        /* Voor responsive */
        .container {
            clear: both !important;
            display: block !important;
            Margin: 0 auto !important;
            max-width: 600px !important;
        }

        .body-wrap .container {
            padding: 20px;
        }

        .content {
            display: block;
            margin: 0 auto;
            max-width: 600px;
        }

        .content table {
            width: 100%;
        }

        .mt-0{
            margin-top: 0px !important;
            margin-block-start: 0px !important;
        }
        .mb-0{
            margin-bottom: 0px !important;
            margin-block-end: 0px !important;
        }
        .message{
            padding: 0 1rem;
        }
    </style>
</head>

<body bgcolor="#f6f6f6">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td>
                            <h1>Examen registratie</h1>
                            <br>
                            <h2 class="mb-0" style="color: #F58220">Student gegevens</h2>
                            <table>
                                <tr>
                                    <td >Voornaam</td>
                                    <td >{{ Session::get('voornaam') }}</td>
                                </tr>
                                <tr>
                                    <td >Achternaam</td>
                                    <td >{{ Session::get('achternaam') }}</td>
                                </tr>
                                <tr>
                                    <td >Student nummer</td>
                                    <td >{{ Session::get('studentnummer') }}</td>
                                </tr>
                                <tr>
                                    <td >Crebo nummer</td>
                                    <td >{{ Session::get('crebo_nr') }}</td>
                                </tr>
                                <tr>
                                    <td >Opleiding</td>
                                    <td >{{ Session::get('opleiding') }}</td>
                                </tr>
                                <tr>
                                    <td >Vak</td>
                                    <td >{{ Session::get('vak') }}</td>
                                </tr>
                                <tr>
                                    <td >Examen</td>
                                    <td >{{ Session::get('examen') }}</td>
                                </tr>
                                <tr>
                                    <td >Faciliteiten pas</td>
                                    <td >{{ Session::get('faciliteitenpas') }}</td>
                                </tr>
                           
                                <tr>
                                    <td><br><h2 class="mb-0" style="color: #F58220">Inhoud</h2></td>
                                </tr>
                            
                                <tr>
                                    <td>Onderwerp</td>
                                    <td ><a  class=”link” href="#" target="_blank">Klik hier om te bevestigen</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td></td>
    </tr>
</table>
<!-- /body -->

<!-- footer -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td align="center">
                            <p>© Deltion College - www.deltion.nl  </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /content -->

        </td>
        <td></td>
    </tr>
</table>
<!-- /footer -->

</body>
</html>