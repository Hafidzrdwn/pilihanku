<?php


class User extends Database
{
  private $table = 'users';

  public function create($data)
  {
    return $this->insert($data, $this->table);
  }

  public function user($id)
  {
    return $this->find($id, $this->table);
  }

  public function getBy($data = [])
  {
    return $this->where($data, $this->table);
  }
}
