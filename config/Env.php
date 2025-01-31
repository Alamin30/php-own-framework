<?php
namespace config;
class Env
{
    public static function get($key, $default = null)
    {
        $env = parse_ini_file('../.env');

        return isset($env[$key]) ? $env[$key] : $default;
    }

}