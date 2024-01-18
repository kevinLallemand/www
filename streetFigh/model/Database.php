<?php
include "config.php";

abstract class Database
{
    // Protége l'accés à la variable et la rend accessible seulement pour l'instance des classes filles.
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8', LOGIN, PASSWORD);
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    public function __destruct()
    {
        $this->db = NULL;
    }
}
