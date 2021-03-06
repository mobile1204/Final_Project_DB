<?php
namespace Core;
ini_set('display_errors',1);
error_reporting(E_ALL);
    abstract class Controller
    {
        protected $route_params=[];
        
        public function __construct($route_params)
        {
            $this->route_params=$route_params;
        }

        public function __call($name, $args)
        {
            $method = $name . 'Action';
            if (method_exists($this, $method)) {
                if ($this->before() !== false) {
                    call_user_func_array([$this,$method], $args);
                    $this->after();
                }
            }else{
                echo "method not found";
            }   
        }

        protected function before() {

        }

        protected function after() {

        }
    }

?>