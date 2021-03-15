<?php

function loader($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        
    if (file_exists(BASE_DIR . lcfirst($class) . '.php'))
    {
        require_once BASE_DIR . lcfirst($class) . '.php';
    }
    elseif (file_exists(BASE_DIR . CORE_PATH . DS . $class . '.php'))
    {
        require_once BASE_DIR . CORE_PATH . DS . $class . '.php';
    }
    else
    {
       exit('Can\'t load class ' . $class);
    }
}

spl_autoload_register('loader');

