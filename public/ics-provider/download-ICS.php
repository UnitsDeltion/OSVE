<?php

include 'ICS.php';

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=Examen.ics');

$ics = new ICS(array(
  'location' => $_SESSION['location'],
  'description' => "Examen: " . $_SESSION['Examen'] . " Vak: " . $_SESSION['Vak'] . " Opmerkingen: " . $_SESSION['Opmerkingen'],
  'dtstart' => $_SESSION['date_start'],
  'dtend' => $_SESSION['date_end'],
  'summary' => "Examen ingepland voor student " . $_SESSION['Studentnummer'],
  'url' => $_SESSION['url']
));

echo $ics->to_string();

?>