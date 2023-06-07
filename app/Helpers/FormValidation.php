<?php


class FormValidation
{
  public static function make($request, $rules = [])
  {
    $res = [];
    foreach ($request as $key => $value) {
      $request[$key] = htmlspecialchars(trim($value));
      if (array_key_exists($key, $rules)) {
        $rules[$key] = explode('|', $rules[$key]);
      }

      foreach ($rules[$key] as $rule) {
        switch (true) {
          case $rule == 'required':
            if (self::isEmpty($value)) $res[$key][] = str_replace('_', ' ', ucwords($key) . " harus diisi, tidak boleh kosong!");
            break;
          case $rule == 'email':
            if (!self::isEmail($value)) $res[$key][] = "Email tidak valid!";
            break;
          case preg_match('/^matches/', $rule):
            $value2 = $request[explode(':', $rule)[1]];
            if (!self::isMatch($value, $value2)) $res[$key][] = str_replace('_', ' ', ucwords($key) . " tidak cocok!");
            break;
          case preg_match('/^min/', $rule):
            $limit = explode(':', $rule)[1];
            if (!self::checkLength($value, $limit, 'min')) $res[$key][] = 'panjang ' . str_replace('_', ' ', $key . " minimal harus {$limit} karakter!");
            break;
          case preg_match('/^max/', $rule):
            $limit = explode(':', $rule)[1];
            if (!self::checkLength($value, $limit, 'max')) $res[$key][] = 'panjang ' . str_replace('_', ' ', $key . " maksimal {$limit} karakter!");
            break;
        }
      }
    }

    if (count($res) > 0) {
      foreach ($res as $key => $r) {
        $res[$key] = $r[0];
      }

      return [
        'fails' => true,
        'errors' => $res
      ];
    }

    $res = $request;
    return [
      'fails' => false,
      'data' => $res
    ];
  }

  private static function isEmpty($value)
  {
    return empty(trim(stripslashes($value)));
  }
  private static function isEmail($value)
  {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    return preg_match($pattern, $value);
  }
  private static function isMatch($value, $value2)
  {
    return $value === $value2;
  }
  private static function checkLength($value, $limit, $state)
  {
    $limit = intval($limit);
    if ($state == 'min') {
      return strlen(trim($value)) >= $limit;
    } else if ($state == 'max') {
      return strlen(trim($value)) <= $limit;
    }
  }
}
