<?php

function domain($path,$domainname)
    {
        $config['domain'] = $domainname;
        $json = json_encode($config);
        file_put_contents(__DIR__ . '/' . $path, $json);
    }


domain($argv[1], $argv[2]);