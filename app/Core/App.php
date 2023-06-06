<?php

class App
{

  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parse_url();

    if ($url == NULL) $url = [$this->controller, $this->method, $this->params];

    $this->init_controller($url);
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parse_url()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      $url[0] = ucfirst($url[0]);
      return $url;
    }
  }

  public function init_controller($url)
  {
    // controller
    $url[0] = $url[0] . 'Controller';
    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once('../app/controllers/' . $this->controller . '.php');
    $this->controller = new $this->controller;

    // method
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // parameters
    if (!empty($url)) {
      $this->params = array_values($url);
    }
  }
}
