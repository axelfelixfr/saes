<?php

function autoloadController($classname)
{
    include 'controllers/'.$classname.'.php';
}

spl_autoload_register('autoloadController');
