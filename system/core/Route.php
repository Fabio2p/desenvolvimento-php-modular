<?php
/**
 * Classe: Route;
 * Author: fabio.s.a
 * AuthorEmail: fabio.s.a.proweb@gmail.com
 * date: 02-07-2019
 * 
 */
class Route{

    /**
     * Atribute $module:
     */
    private $module     = null;

    /**
     * Atribute $controller;
     */
    private $router = null;
    
    /**
     * Atribute $view;
     */
    private $view       = null; 

    /**
     * Method setModule;
     */
    private function setModule(){

        $this->module = FILTER_INPUT(INPUT_GET, 'module', FILTER_SANITIZE_URL);
    }

     /**
     * Method setRoute;
     */
    private function setRoute(){

        $this->router = FILTER_INPUT(INPUT_GET, 'option', FILTER_SANITIZE_URL);
    }

     /**
     * Method setView;
     */
    private function setView(){

        $this->view = FILTER_INPUT(INPUT_GET, 'view', FILTER_SANITIZE_URL);

    }

     /**
     * Method run: inicialize the App;
     */
    public function run(){
        /**
         * class the setModule method;
         */
        $this->setModule();

         /**
         * class the setRoute method;
         */
        $this->setRoute();

         /**
         * class the setView method;
         */
        $this->setView();

        $path_module = realpath('../modules/'. $this->module);

        echo "Continue...";

    }


}
