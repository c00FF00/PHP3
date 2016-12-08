<?php


class TextHndlr
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
        $this->text = str_replace(["\r", "\n"], "", $this->text);
        return $this;
    }

    public function spacesToOneSpace()
    {
        $res = preg_replace('/\s\s+/', ' ', $this->text);
        $this->text = preg_replace('/ ->/', '->', $res);
        return $this;
    }

    public function semicolonToOneSpace()
    {
        $this->text = str_replace(';', ' ', $this->text);
        return $this;
    }

    public function getText()
    {
        return $this->text;
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