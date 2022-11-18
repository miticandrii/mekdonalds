<?php

class Korisnik
{

    private $conn;
    private $tabela = "korisnik";

    public $id;
    public $email;
    public $ime;
    public $prezime;
    public $napomena;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function postoji()
    {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE email = '" . $this->email . "'";

        if ($result = $this->conn->query($sql)) {

            $korisnik = $result->fetch_assoc();
            if ($korisnik)
                return $korisnik['id'];
            return false;
        }
        return false;
    }

    public function dodaj()
    {

        $sql = "INSERT INTO " . $this->tabela . " (email, ime, prezime, napomena)
        VALUES ('" . $this->email . "', '" . $this->ime . "', '" . $this->prezime . "', '" . $this->napomena . "')";
        if ($this->conn->query($sql)) {
            return $this->conn->insert_id;
        }

        return false;
    }
}
