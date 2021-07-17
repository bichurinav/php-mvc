<?php

function generate_random_string($length = 10) : string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_length = strlen($characters);
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, $characters_length - 1)];
    }
    return $random_string;
}

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function show_error()
{
    if (isset($_SESSION['error']) && $_SESSION != '')
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}