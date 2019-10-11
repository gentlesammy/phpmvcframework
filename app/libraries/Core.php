<?php

/*
    *aPP CORE CLASS
        -CREATE URL
        -LOAD CORE CONTROLLER
        URL FORMAT: /controller/method/params
*/
class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

   public function __construct(){
       $url = $this->getUrl();
       //look in controllers for first value i array $url
      if(file_exists('../app/controllers/'. ucwords($url[0]. '.php'))){
            //controller for the page exist
            $this->currentController = ucwords($url[0]);
            //unset the $url[0]
            unset($url[0]);
       }

       //require controller class 
       require_once('../app/controllers/'. $this->currentController . '.php');
       //instantiate the controller class
       $this->currentController = new $this->currentController; 
       //check for method part of the url
       if(isset($url[1])){
           if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1]; 
                unset($url[1]);
           }
       }//end of get method 

       // Get params
      $this->params = $url ? array_values($url) : [];
      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/');
           $url = filter_var($url, FILTER_SANITIZE_URL); 
           $url = explode('/', $url);
            return $url;
        }
    }//get url function ends here

  



}//core class ends here


?>