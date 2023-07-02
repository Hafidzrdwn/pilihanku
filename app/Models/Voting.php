<?php


class Voting extends Database
{
  private $table = 'votings';

  public function create($data)
  {
    return $this->insert($data, $this->table);
  }

  public function edit($where, $data)
  {
    return $this->update($where, $data, $this->table);
  }

  public function user($id)
  {
    return $this->find($id, $this->table);
  }

  public function getBy($data = [], $type = 'single')
  {
    return $this->where($data, $type, $this->table);
  }
}
