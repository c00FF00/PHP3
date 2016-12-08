<?php

class TextHandler
{

    public function getCountChain($word)
    {
        $res = explode('->', $word);
        return count($res) - 1;
    }

    public function makeLine($lines)
    {
        return str_replace(["\r", "\n"], "", $lines);
    }

    public function removeSpace($text)
    {
        $res = preg_replace('/\s\s+/', ' ', $text);
        return preg_replace('/ ->/', '->', $res);
    }

    public function makeArrayOfLines($lines, $delimiter)
    {
        return explode($delimiter, $lines);
    }
}