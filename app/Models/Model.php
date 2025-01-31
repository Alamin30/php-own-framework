<?php

namespace app\Models;


use database\Database;
use PDO;

class Model
{
    protected $connection;
    protected $table;
    protected $primaryKey = "id";
    protected $attributes = [];
    protected $fillable = [];

    public function __construct() {
        $this->connection = Database::connect();
    }

    public function find($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?");
        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function get()
    {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($data)
    {
        $columns = implode(",", array_keys($data));
        $values = implode(",", array_fill(0, count($data), "?"));
        $statement = $this->connection->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$values})");

        return $statement->execute(array_values($data));
    }


}