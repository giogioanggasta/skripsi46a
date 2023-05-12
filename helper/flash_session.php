<?php

if (!isset($_SESSION))
    session_start();

function flash($name = '', $message = '', $class = '')
{
    if ($class == 'red') {
        $class = 'alert alert-danger';
    } else if ($class == 'green') {
        $class = 'alert alert-success';
    }

    if ($name != '') {
        $_SESSION[$name] = '<center><div class="w-50 ' . $class . '" >' . $message . '</div></center> <br>';
    }
    // unset($_SESSION[$name]);
    // unset($_SESSION[$name . '_class']);

}

function redirect($location)
{
    header("Location: {$location}");
    exit();
}
