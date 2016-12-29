<?php


function getRegisterdisqualified($urlpage)
{

$content = file_get_contents($urlpage);

$pattern = '/data-[0-9]{8}-structure-[0-9]{8}.csv/';


if (preg_match($pattern, $content, $match)) {

return $urlpage . '/' . $match[0];

} else { return null;  }



}
