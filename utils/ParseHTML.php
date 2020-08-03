<?php


class ParseHTML
{

    public static function parseText($html, $array)
    {
        foreach ($array as $key => $value) {
            $html = str_replace('{{ '.$key.' }}', $value != null ? $value : "", $html);
        }

        return $html;
    }

    public static function parseFile($path, $array) {
        return self::parseText(file_get_contents($path), $array);
    }

}