<?php

class Proizvod
{

    private $conn;
    private $tabela = "proizvod";

    public $id;
    public $naziv;
    public $slika_url;
    public $id_kategorija;
    public $kolicina_na_stanju;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get()
    {
        $sql = "SELECT * FROM " . $this->tabela;

        $proizvod = array();
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($proizvod, $row);
            }
        }
        return $proizvod;
    }
    
    public function getPoKategoriji()
    {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE id_kategorija = $this->id_kategorija";

        $proizvod = array();
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($proizvod, $row);
            }
        }
        return $proizvod;
    }
    public function getNaStanju()
    {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE id = " . $this->id;

        return $this->conn->query($sql)->fetch_assoc()['kolicina_na_stanju'];
    }

    public function smanjiStanje($zaKoliko)
    {
        $sql = "UPDATE " . $this->tabela . " SET kolicina_na_stanju = kolicina_na_stanju - " . $zaKoliko . "  WHERE id = " . $this->id;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
