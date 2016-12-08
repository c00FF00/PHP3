<?php

class TextHandler
{
    public $counter = 0;
    public $chain = '';
    public $text;

    public function getCountChain($word, $symbol)
    {
        $res = explode($symbol, $word);
        return count($res) - 1;
    }

    public function makeLine()
    {
        return str_replace(["\r", "\n"], "", $this->text);
    }

    public function spacesToOneSpace()
    {
        $res = preg_replace('/\s\s+/', ' ', $this->text);
        return preg_replace('/ ->/', '->', $res);
    }

    public function semicolonToOneSpace()
    {
        return str_replace(';', ' ', $this->text);
    }

    public function makeArrayOfLines($lines, $delimiter)
    {
        return explode($delimiter, $lines);
    }

    public function searchMaxChain($array, $symbol)
    {
        foreach ($array as $item) {

            $currentcount = $this->getCountChain($item, $symbol);

            if ($currentcount > $this->counter) {
                $this->chain = $item;
                $this->counter = $currentcount;
            } else {
                continue;
            }

            return $this->chain;

        }
    }


}