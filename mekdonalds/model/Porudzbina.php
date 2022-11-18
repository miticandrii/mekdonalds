<?php

class Porudzbina
{

    private $conn;
    private $tabela = "porudzbina";

    public $id;
    public $korisnik_id;
    public $proizvod_id;
    public $kolicina;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function poKorisniku()
    {
        $sql = "SELECT por.*, por.id AS porudzbina_id, k.*, p.* FROM " . $this->tabela . " por
                JOIN proizvod p ON p.id = por.proizvod_id
                JOIN korisnik k ON k.id = por.korisnik_id
                WHERE korisnik_id = " . $this->korisnik_id;
        $porudzbine = array();
        $res = $this->conn->query($sql);
        if ($res) {
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    array_push($porudzbine, $row);
                }
            }
        }
        return $porudzbine;
    }

    public function obrisi()
    {
        $sql = "DELETE FROM " . $this->tabela . " WHERE id = " . $this->id;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function napravi()
    {

        $sql = "INSERT INTO " . $this->tabela . " (korisnik_id, proizvod_id, kolicina)
        VALUES ('" . $this->korisnik_id . "', '" . $this->proizvod_id . "', $this->kolicina)";
        if ($this->conn->query($sql)) {
            return true;
        }

        return false;
    }
}
