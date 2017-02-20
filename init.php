<?php

use b2r\Component\SimpleDump\SimpleDump;

//------------------------------------------------------------
// Register global `p` function
//------------------------------------------------------------
if (!function_exists('p')) {
    function p()
    {
        echo SimpleDump::dumpValues(func_get_args());
    }
}

//------------------------------------------------------------
// Register global `ps` function
//------------------------------------------------------------
if (!function_exists('ps')) {
    function ps()
    {
        return SimpleDump::dumpValues(func_get_args());
    }
}
