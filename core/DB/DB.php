<?php

namespace Core\DB;

class DB
{
    protected ?object $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO(
                'mysql:host=esgi-c-sm_database;dbname=root;charset=utf8',
                'root',
                'password'
            );
        } catch (\PDOException $e) {
            echo 'Erreur SQL : '.$e->getMessage();
        }
    }

    public function prepare(string $sql): object
    {
        return $this->pdo->prepare($sql);
    }

}
