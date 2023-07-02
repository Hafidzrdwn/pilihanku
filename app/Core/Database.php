<?php

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  private $dbh; // database handler
  private $stmt; // statement

  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;

        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;

        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;

        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function all($table_name)
  {
    $this->query('SELECT * FROM ' . $table_name);
    return $this->resultSet();
  }

  public function insert($data, $table_name)
  {

    $columns = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));

    $query = "INSERT INTO $table_name ($columns) VALUES ($placeholders)";

    $this->query($query);

    foreach ($data as $param => $value) {
      $this->bind($param, $value);
    }

    $this->execute();
    return $this->find($this->lastInsertId(), $table_name);
  }

  public function find($id, $table_name)
  {
    $this->query('SELECT * FROM ' . $table_name . ' WHERE id=:id');
    $this->bind('id', $id);
    return $this->single();
  }

  public function where($data, $type, $table_name)
  {
    $query = 'SELECT * FROM ' . $table_name . ' WHERE ';
    $i = 0;
    foreach ($data as $key => $value) {
      if ($i == 0) {
        $query .= $key . ' = :' . $key;
      } else {
        $query .= ' AND ' . $key . ' = :' . $key;
      }
      $i++;
    }

    $this->query($query);

    foreach ($data as $key => $value) {
      $this->bind($key, $value);
    }

    if ($type == 'all') return $this->resultSet();

    return $this->single();
  }

  public function update($where, $data, $table_name)
  {
    $query = 'UPDATE ' . $table_name . ' SET ';
    $i = 0;
    foreach ($data as $key => $value) {
      if ($i == 0) {
        $query .= $key . ' = :' . $key;
      } else {
        $query .= ', ' . $key . ' = :' . $key;
      }
      $i++;
    }

    $query .= ' WHERE ';
    $i = 0;
    foreach ($where as $key => $value) {
      if ($i == 0) {
        $query .= $key . ' = :' . $key;
      } else {
        $query .= ' AND ' . $key . ' = :' . $key;
      }
      $i++;
    }

    $this->query($query);

    foreach ($data as $key => $value) {
      $this->bind($key, $value);
    }

    foreach ($where as $key => $value) {
      $this->bind($key, $value);
    }

    return $this->execute();
  }
}
