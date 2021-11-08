<?php

include 'ICS.php';

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=Examen.ics');

$ics = new ICS(array(
  'location' => $_SESSION['location'],
  'description' => "Omschrijving",
  'dtstart' => $_SESSION['date_start'],
  'dtend' => $_SESSION['date_end'],
  'summary' => "Examen ingepland voor student",
  'url' => "https://deltion.nl"
));

echo $ics->to_string();

?>