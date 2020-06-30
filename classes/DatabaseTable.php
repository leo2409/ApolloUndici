<?php
namespace Framework;

class DatabaseTable
{
    private $pdo;
    private $table;
    private $primarykey;

    public function __construct(\PDO $pdo,string $table,string $primarykey) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primarykey = $primarykey;
    }

    public function query($sql,$parameters = []) 
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $stmt;
    }

    private function processDate($fields) {
      foreach ($fields as $key => $value) {
        if ($value instanceof \DateTime) {
          $fields[$key] = $value->format('Y-m-d H:i:s');
        }
      }

      return $fields;
    }
    
    public function save($record) 
    {
      try {
        if(empty($record[$this->primarykey])) {
          $this->primarykey = NULL;
        }
        // INSERT
        $this->insert($record);
      } catch (\PDOException $e) {
        // UPDATE
        $this->update($record);
      }
    }

    public function findAll() 
    {
        $result = $this->query('SELECT * FROM ' . $this->table . ';');
        return $result->fetchAll();
    }

    public function findById($id) 
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->primarykey . ' = :id;';
        $parameters = [':id' => $id ];
        $query = $this->query($sql,$parameters);
        return $query->fetch();
    }

    public function find($column, $value) {
      $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value;';
      $parameters = ['value' => $value];
      $query = $this->query($sql, $parameters);
      return $query->fetchAll();
    }

    public function total() {
        $query = $this->query('SELECT COUNT(*) FROM ' . $this->table . ';');
        $row = $query->fetch();
        return $row[0];
    }

    public function remove($id) 
    {
      $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->primarykey . ' = :id;';
      $parameters = [
        'id'   => $id,
      ];
      $this->query($sql,$parameters);
    }

    private function insert($fields) 
    {
        $sql = 'INSERT INTO ' . $this->table . ' SET ';
        foreach ($fields as $key => $value) {
          $sql .= ' ' . $key . '= :' . $key . ',';
        }
        $sql = rtrim($sql,',') . ';';

        $fields = $this->processDate($fields);

        $this->query($sql,$fields);
    }

    private function update($fields) 
    {
        $sql = 'UPDATE ' . $this->table . ' SET ';
        foreach ($fields as $key => $value) {
          $sql .= $key . ' = :' . $key . ",";
        }
        $sql = rtrim($sql, ',');
        $sql .= ' WHERE ' . $this->primarykey . ' = :primarykey;';

        $fields['primarykey'] = $fields[$this->primarykey];
        $fields = $this->processDate($fields);

        $this->query($sql,$fields);
    }
}
?>