<?php
spl_autoload_register( function($className){
    try {
        require_once __DIR__.'/models/'.$className.'.php';
    } catch (Exception $e) {
        print $e->getMessage();
    }

});