<?php


/**
 * @param $urlpage
 * @return fullurlpath
 */
function makeRegisterdisqualifiedURL($urlpage)
{

    $content = file_get_contents($urlpage);

    $pattern = '/data-[0-9]{8}-structure-[0-9]{8}.csv/';

    if (preg_match($pattern, $content, $match)) {

        return $urlpage . '/' . $match[0];

    } else {

        return null;

    }

}

/**
 * @param $russianDate dd.mm.YYYY
 * @return string YYYY-mm-dd
 */
function formatDate($russianDate)
{
    return implode('-', array_reverse(explode('.', $russianDate)));;
}


/**
 * @param $data
 * @return string without control character
 */
function removeControlCharacter($data)
{

    $character = ["\r\n", "\n", "\r"];
    return str_replace($character, '', $data);

}
