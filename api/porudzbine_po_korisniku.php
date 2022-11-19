<?php
require('../db/db.php');
require('../model/Porudzbina.php');
require('../model/Proizvod.php');
require('../model/Korisnik.php');

$porudzbina = new Porudzbina($conn);
$korisnik = new Korisnik($conn);
$korisnik->email =  $_GET['korisnik_email'];
$korisnikId = $korisnik->postoji();
if ($korisnikId) {
    $porudzbina->korisnik_id = $korisnikId;
    echo json_encode($porudzbina->poKorisniku());
} else echo json_encode('');
