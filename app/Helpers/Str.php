<?php


class Str
{
  public static function makeSlug($string)
  {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9 -]+/', '', $string);
    $string = preg_replace('/\s+/', ' ', $string);
    $string = preg_replace('/\s/', '-', $string);

    return $string;
  }
}
