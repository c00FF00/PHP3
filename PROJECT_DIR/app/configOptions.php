<?php

namespace App;

class configOptions
{
    protected static $configfile = __DIR__ . '/../config.json';

    public static function domain()
    {
        $conf = json_decode(file_get_contents(static::$configfile));
        return $conf->domain;
    }
}
