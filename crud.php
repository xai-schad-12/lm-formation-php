<?php

class Crud
{
    private $pdo;
    private $table;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    // CREATE
    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($data);
    }

    // READ ALL
    public function readAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ ONE
    public function readOne($id, $idColumn = "id")
    {
        $sql = "SELECT * FROM {$this->table} WHERE $idColumn = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $data, $idColumn = "id")
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }

        $setString = implode(", ", $set);

        $sql = "UPDATE {$this->table} SET $setString WHERE $idColumn = :id";
        $stmt = $this->pdo->prepare($sql);

        $data['id'] = $id;

        return $stmt->execute($data);
    }

    // DELETE
    public function delete($id, $idColumn = "id")
    {
        $sql = "DELETE FROM {$this->table} WHERE $idColumn = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}

?>