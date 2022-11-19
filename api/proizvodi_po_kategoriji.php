<?php
require('../db/db.php');
require('../model/Porudzbina.php');
require('../model/Proizvod.php');

$proizvodi = new Proizvod($conn);
$proizvodi->id_kategorija = $_GET['id_kategorija'];
echo json_encode($proizvodi->getPoKategoriji());
