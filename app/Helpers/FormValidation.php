<?php


class FormValidation
{
  public static function make($request, $rules = [])
  {
    $res = [];
    // mapping request and rules
    foreach ($request as $key => $value) {
      $request[$key] = htmlspecialchars(trim($value));
      if (array_key_exists($key, $rules)) {
        $rules[$key] = explode('|', $rules[$key]);
      } else {
        unset($request[$key]);
      }
    }

    // validation process per field
    foreach ($request as $k => $val) {
      foreach ($rules[$k] as $rule) {
        switch (true) {
          case $rule == 'required':
            if (self::isEmpty($val)) $res[$k][] = str_replace('_', ' ', ucwords($k) . " harus diisi, tidak boleh kosong!");
            break;
          case $rule == 'email':
            if (!self::isEmail($val)) $res[$k][] = "Email tidak valid!";
            break;
          case preg_match('/^matches/', $rule):
            $value2 = $request[explode(':', $rule)[1]];
            if (!self::isMatch($val, $value2)) $res[$k][] = str_replace('_', ' ', ucwords($k) . " tidak cocok!");
            break;
          case preg_match('/^min/', $rule):
            $limit = explode(':', $rule)[1];
            if (!self::checkLength($val, $limit, 'min')) $res[$k][] = 'panjang ' . str_replace('_', ' ', $k . " minimal harus {$limit} karakter!");
            break;
          case preg_match('/^max/', $rule):
            $limit = explode(':', $rule)[1];
            if (!self::checkLength($val, $limit, 'max')) $res[$k][] = 'panjang ' . str_replace('_', ' ', $k . " maksimal {$limit} karakter!");
            break;
          case preg_match('/^unique/', $rule):
            $table = explode(':', $rule)[1];
            if (self::isExist($k, $val, $table)) $res[$k][] = str_replace('_', ' ', $k . " sudah terdaftar!");
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
  private static function isExist($key, $value, $table)
  {
    $db = new Database;
    $db->query("SELECT * FROM {$table} WHERE {$key} = :{$key}");
    $db->bind($key, $value);
    return $db->single();
  }
}
