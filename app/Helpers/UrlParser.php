<?php

class UrlParser
{
  public static function find_query_params($url)
  {
    if (strpos($url, '?') !== false) {
      $url = trim($url, '/');
      $query = explode('?', $url)[1];
      $params = [];

      if (strpos($query, '&') !== false) {
        $query = explode('&', $query);
        foreach ($query as $q) {
          $q = explode('=', $q);
          $params[$q[0]] = $q[1];
        }
      } else {
        $query = explode('=', $query);
        $params[$query[0]] = $query[1];
      }

      return $params;
    }

    return null;
  }
}
