<?php
require('../db/db.php');
require('../model/Porudzbina.php');
require('../model/Proizvod.php');
$proizvodi = new Proizvod($conn);
echo json_encode($proizvodi->get());
