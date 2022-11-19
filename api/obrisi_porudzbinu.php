<?php
require('../db/db.php');
require('../model/Porudzbina.php');

$porudzbina = new Porudzbina($conn);
$porudzbina->id = $_GET['porudzbina_id'];

echo json_encode($porudzbina->obrisi() ? "Uspesno obrisano" : "Doslo je do greske");
