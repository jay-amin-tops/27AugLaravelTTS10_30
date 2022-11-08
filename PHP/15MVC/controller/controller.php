<?php

class controller{
    // public $static_base_url = "http://localhost/laravel/27AugLaravelTTS10_30/PHP/15MVC/assets/";
    public $static_base_url = "http://localhost/laravel/27AugLaravelTTS10_30/27AugLaravelTTS10_30/PHP/15MVC/assets/";
    public $base_url = "";
    public function __construct(Type $var = null) {
        // echo "<pre>";
        // print_r($_SERVER);
        // echo "http://localhost/laravel/27AugLaravelTTS10_30/PHP/15MVC/assets/";
        $ReqURI = explode("/",$_SERVER['REQUEST_URI']);
        // print_r($ReqURI);
        $this->base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".$ReqURI[1]."/".$ReqURI[2]."/".$ReqURI[3]."/".$ReqURI[4]."/assets/";
        // echo "<br>";
        // echo $this->base_url;
        // echo "</pre>";


        // echo "called __construct";
        // echo "<pre>";
        // print_r($_SERVER);
        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    // echo "Home page";
                    include_once("views/header.php");
                    include_once("views/mainpage.php");
                    include_once("views/footer.php");
                    break;
                case '/about':
                    include_once("views/header.php");
                    echo "<h2>About us Page Data will be here<h2>";
                    include_once("views/footer.php");
                    break;
                case '/contact':
                    include_once("views/header.php");
                    echo "<h2>Contact us Page Data will be here<h2>";
                    include_once("views/footer.php");
                    break;
                case '/login':
                    include_once("views/header.php");
                    include_once("views/loginpage.php");
                    include_once("views/footer.php");
                    break;
                case '/register':
                    include_once("views/header.php");
                    include_once("views/signup_page.php");
                    include_once("views/footer.php");
                    if (isset($_POST['btn-regist'])) {
                        echo"<pre>";
                        print_r($_REQUEST);
                    }
                    break;
                default:
                    include_once("views/header.php");
                    echo "404 Page Not Found";
                    include_once("views/footer.php");
                    break;
            }
        }else{
            header("location:home");
        }
       
    }
}
$controller = new controller;

?>