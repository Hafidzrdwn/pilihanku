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
    $data['user'] = $this->model('User')->getBy(['code' => $code]);

    $this->render('user/dashboard', $data);
  }
}
