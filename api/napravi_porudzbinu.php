<?php
require('../db/db.php');
require('../model/Porudzbina.php');
require('../model/Proizvod.php');
require('../model/Korisnik.php');

$porudzbina = new Porudzbina($conn);
$proizvod = new Proizvod($conn);

$korisnik = new Korisnik($conn);

$korisnik->ime = $_POST['ime'];
$korisnik->prezime = $_POST['prezime'];
$korisnik->email = $_POST['email'];
$korisnik->napomena = $_POST['napomena'];

$korisnikId = $korisnik->postoji();
if ($korisnikId) {
    $porudzbina->korisnik_id = $korisnikId;
} else
    $porudzbina->korisnik_id = $korisnik->dodaj();


$kupljeniProizvodi =  $_POST['kupljeniProizvodi'];
foreach ($kupljeniProizvodi as $p) {
    $proizvod->id = $p['id'];
    $naStanju = $proizvod->getNaStanju();
    if ($naStanju < $p['kolicina'])
        die("Ne postoji toliko na stanju proizvoda " . $p['naziv']);
}

foreach ($kupljeniProizvodi as  $p) {
    $proizvod->id = $p['id'];
    $porudzbina->proizvod_id = $p['id'];
    $porudzbina->kolicina = $p['kolicina'];

    if (!$porudzbina->napravi()) {
        die("Greska prilikom porucivanja.");
        break;
    }
    $proizvod->smanjiStanje($p['kolicina']);
}
echo "Uspesno dodata porudzbina.";
