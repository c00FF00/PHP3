<?php

function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


function template($template)
{

    if (is_file($template)) {

        return $template;

    } else {

        return false;

    }
}
