<?php
require_once("model/model.php");
class controller extends model{
    // public $static_base_url = "http://localhost/laravel/27AugLaravelTTS10_30/PHP/15MVC/assets/";
    public $static_base_url = "http://localhost/laravel/27AugLaravelTTS10_30/27AugLaravelTTS10_30/PHP/15MVC/assets/";
    public $base_url = "";
    public function __construct(Type $var = null) {
        ob_start();
        parent::__construct();
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
                    // echo "<pre>";
                    // print_r($_REQUEST);
                    if (isset($_REQUEST['btn-login'])) {
                        # code...
                        $LoginRes = $this->login($_REQUEST['username'],$_REQUEST['password']);
                        // echo "<pre>";
                        // print_r($LoginRes);
                        if ($LoginRes['Code'] == 1) {
                            $_SESSION['UserData'] = $LoginRes['Data'];
                            if ($LoginRes['Data']->role_id == 1) {
                                header("location:admindashboad");
                            }else{
                                header("location:home");
                            }
                        }else{
                            echo "<script>alert('invalid user')</script>";
                        }
                    }
                    break;
                case '/register':
                    include_once("views/header.php");
                    include_once("views/signup_page.php");
                    include_once("views/footer.php");
                    if (isset($_POST['btn-regist'])) {
                        // echo"<pre>";
                        // print_r($_REQUEST);
                        // $res = $this->insert('users',array("username"=>"test","password"=>"123","gender"=>"Male","city"=>"1","hobby"=>"Circket,Music"));
                        $hobby = implode(",",$_REQUEST['chk']);
                        $fullName = $_REQUEST['fname']." ".$_REQUEST['lname'];
                        // print_r($hobby);
                        unset($_REQUEST['chk']);
                        unset($_REQUEST['fname']);
                        unset($_REQUEST['lname']);
                        array_pop($_REQUEST);
                        array_pop($_REQUEST);
                        $newArray=array_merge($_REQUEST,array("fullname"=>$fullName),array("hobby"=>$hobby));
                        // print_r($newArray);
                        $res = $this->insert('users',$newArray);
                        // echo "<pre>";
                        // print_r($res);
                        if ($res['Code'] == "1") {
                            echo "<script>alert('Congratulation !!!!')</script>";
                            header("localhost:login");
                        }else{
                            echo "<script>alert('Error while inserting try after sometime !!!!')</script>";
                        }
                    }
                    break;
                case '/admindashboad':
                    include_once("views/admin/adminheader.php");
                    echo "called";
                    include_once("views/admin/adminfooter.php");
                    break;    
                case '/viewalluser':
                    $allUsers = $this->select("users");
                    // echo "<pre>";
                    // print_r($allUsers);
                    // exit;
                    include_once("views/admin/adminheader.php");
                    include_once("views/admin/allusers.php");
                    include_once("views/admin/adminfooter.php");
                    break;    
                case '/deleteuserdata':
                    echo "data will be deleted...";
                    echo "<pre>";
                    print_r($_REQUEST);
                    print_r($_REQUEST['userid']);
                    break;    
                case '/edituserdata':
                    // print_r($_REQUEST);
                    // print_r($_REQUEST['userid']);
                    // exit;
                    $usersDataById = $this->select("users",array("id"=>$_GET['userid'],"status"=>1));
                    include_once("views/admin/adminheader.php");
                    include_once("views/admin/edituser.php");
                    include_once("views/admin/adminfooter.php");

                    $data=array("username"=>$_REQUEST['username'],"gender"=>$_REQUEST['gender']);
                        // print_r($newArray);
                        $res = $this->update('users',$data,array("id"=>$_REQUEST['userid']));
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
       ob_flush();
    }
}
$controller = new controller;

?>