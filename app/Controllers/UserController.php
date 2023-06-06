<?php


class UserController extends Controller
{
  public function index($code)
  {
    $data['judul'] = $code;

    $this->render('user/dashboard', $data);
  }
}
