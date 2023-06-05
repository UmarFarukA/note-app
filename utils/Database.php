<?php

namespace utils;

use PDO;
use PDOException;


class Database
{

    public $pdo;
    public $stm;

    function __construct($config)
    {
        try {
            $dsn = "mysql:host=" . $config['database']['host'] . ";dbname=" . $config['database']['dbname'];
            $this->pdo = new PDO($dsn, $config['database']['username'], $config['database']['password']);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pe) {
            die("Could not connect to the database " . $pe->getMessage());
        }
    }

    public function query($query, $params = [])
    {
        $this->stm = $this->pdo->prepare($query);

        $this->stm->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->stm->fetchAll();
    }

    public function findOne()
    {
        return $this->stm->fetch();
    }

    public function findOneOrFail($status = Response::NOT_FOUND)
    {

        return $this->findOne() ?? abort($status);
    }
}
