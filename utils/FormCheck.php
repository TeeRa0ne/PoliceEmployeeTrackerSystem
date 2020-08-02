<?php


class FormCheck
{

    public static function checkFields($fields) {
        $valid = true;

        foreach ($fields as $field) {
            if (!isset($_POST[$field]) || (empty($_POST[$field]) && $field == null)) $valid = false;
        }

        return $valid;
    }

}