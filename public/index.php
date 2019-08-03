<?php 
    /**
     * instance the Route class;
     * author: fabio.s.a
     * authorEmail: fabio.s.a.proweb@gmail.com
     */

     /**
      * require the Route class;
      */
    require_once "../system/core/Route.php";
  
    /**
     * Require for auto load of the class
     */
    require_once "../config/config.autoload.php";
    /**
     * create the object 
     */
    $inicialize = new Route();

    /**
     * call the run method;
     */
    $inicialize->run();
?>