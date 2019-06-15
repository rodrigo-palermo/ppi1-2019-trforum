<?php

spl_autoload_register( function($className) {
    try {
        require_once __DIR__.'/model/'.$className.'.php';
    } catch (Exception $e) {
        print $e->getMessage();
    }

});
session_start();

require_once __DIR__.'/controller/principal.php';