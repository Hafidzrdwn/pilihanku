<?php


class UserController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware->auth();
  }

  public function index($code)
  {
    $data['judul'] = $code;

    $this->render('user/dashboard', $data);
  }
}
