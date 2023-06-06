<?php


class HomeController extends Controller
{
  public function index()
  {
    $data['judul'] = 'Web Voting Online';
    $this->render('home', $data);
  }
}
