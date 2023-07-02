<?php


class VotingType extends Database
{
  private $table = 'voting_types';

  public function get()
  {
    return $this->all($this->table);
  }

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

  public function getBy($data = [])
  {
    return $this->where($data, $this->table);
  }
}
