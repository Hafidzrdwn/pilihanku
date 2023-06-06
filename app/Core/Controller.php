<?php

class Controller
{
  public function render($view, $data = [])
  {
    require_once('../app/views/templates/header.php');
    require_once('../app/views/' . $view . '.php');
    require_once('../app/views/templates/footer.php');
  }

  public function model($model)
  {
    require_once('../models/' . $model . '.php');
    return new $model;
  }
}
