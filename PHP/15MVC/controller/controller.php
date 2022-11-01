<?php

class controller{
    public $static_base_url = "http://localhost/laravel/27AugLaravelTTS10_30/PHP/15MVC/assets/";
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
        include_once("views/header.php");
        include_once("views/mainpage.php");
        include_once("views/footer.php");
    }
}
$controller = new controller;

?>