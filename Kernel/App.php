<?php 

    class App{

        public function __construct(){
            
            $ArrayRouter = $this->urlHanlde();
            
            if(isset($ArrayRouter) && gettype($ArrayRouter) === "string"){

                echo $ArrayRouter;

            }
            else{

                require_once ("./router/web.php");

                $request_url = $_SERVER['REQUEST_URI'];

                $method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    
                $router->mapRoute($request_url, $method_url);

            }
        }

        function urlHanlde() {

            $urlPage = '';
    
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    
                $urlPage = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
            }else{
    
                $urlPage = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
            }
    
            return parse_url($urlPage);
        }
    }