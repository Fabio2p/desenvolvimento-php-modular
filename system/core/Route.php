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
    private $path_modules = null;

    /**
     * Atribute $controller;
     */
    private $router = null;
    
    /**
     * Atribute $view;
     */
    private $view   = null; 

    /**
     * Method setModule;
     */
    private function setModule(){

        $this->path_modules = FILTER_INPUT(INPUT_GET, 'module', FILTER_SANITIZE_URL);
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
         * the setModule method;
         */
        $this->setModule();

         /**
         * the setRoute method;
         */
        $this->setRoute();

         /**
         * the setView method;
         */
        $this->setView();

        /**
         * verify if the params in the browser is empty
         */
        
        if(!empty($this->path_modules) && !empty($this->router)):
            /**
             * Directory address modules.
             */
            $path_module = realpath('../modules/'.$this->path_modules);

            /**
             * if it's directory
             */
            if(is_dir($path_module)):

                $controoler = $path_module. "/controllers/{$this->router}Controller.php";
                /**
                 * If file exists, continue...
                 */
                if(file_exists($controoler)):

                    require_once($controoler);
                    /**
                     * If class exists, continue...
                     */
                    if(class_exists($this->router)):

                        $obj_controller = new $this->router();
                        /**
                         * ternary condition
                         */
                        $method = (empty($this->view) || $this-view == null ? "index" : $this->view);
                        /**
                         * If method exists, continue...
                         */
                        if(method_exists($obj_controller, $method)):

                            $obj_controller->$method();

                        endif;    
                        
                    endif; // end if 4º.   if class  exists 

                else:

                    echo "Arquivo não encontrado! (:";   

                endif; // end if 3º   file exists 
                

            endif;    // end if 2º directory modulez

        /**
         * 
         */
        else:
            /**
             * Directory address modules.
             */
            $path_module = realpath('../modules/index');

            /**
             * if it's directory
             */
            if(is_dir($path_module)):

                $controoler = $path_module. "/controllers/homeController.php";
                /**
                 * If file exists, continue...
                 */
                if(file_exists($controoler)):

                    require_once($controoler);
                    /**
                     * If class exists, continue...
                     */
                    if(class_exists('Home')):

                        $obj_controller = new Home();
                        
                        /**
                         * If method exists, continue...
                         */
                        if(method_exists($obj_controller, 'index')):

                            $obj_controller->index();

                        endif;    
                        
                    endif; // end if 4º.   if class  exists 

                else:

                    echo "Arquivo não encontrado! (:";   

                endif; // end if 3º   file exists 
                

            endif;    // end if 2º directory modulez

        /**
         * End condition
         */
        endif; // end if 1º it's is not empty
    }


}
