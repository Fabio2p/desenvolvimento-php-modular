<?php
/**
 * Function for autoload of the class;
 * 
 * author: fabio.s.a
 * authorEmail: fabio.s.a.proweb@gmail.com
 * 
 * date: 03-08-2019;
 */

function __autoload($class){

    // set dir and archives with extensions .php

    $archive = ['../system/core/','../system/database/'];
    
    foreach($archive as $load_class):
        
        if(file_exists(__DIR__."{$load_class}\\{$class}.class.php") && !is_dir(__DIR__."{$load_class}\\{$class}.class.php")):

            include_once(__DIR__."{$load_class}\\{$class}.class.php");

        endif;

    endforeach;
}

