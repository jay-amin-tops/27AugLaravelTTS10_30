<?php
date_default_timezone_set('Asia/Kolkata');
error_reporting(0);
class model{
    // public $Connection = "test";
    public $Connection = "";
    // public $Connection = new mysqli("host_name","username","password","databasename");
    // public $Connection = new mysqli("localhost","root","","masterdatabase");
    public function __construct() {
        try {
            $this->Connection = new mysqli("localhost1","root","","masterdatabase");
            echo "<pre>";
            print_r($this->Connection);
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
            if (!file_exists("log")) {
                mkdir("log");
            }
            $msg = "Error DateTime =>> ".date('d-m-Y H:i:s A');
            $msg .= PHP_EOL."Error Msg =>> ".$e->getMessage();
            file_put_contents("log/".date('d_m_Y')."_log.txt",PHP_EOL.$msg.PHP_EOL,FILE_APPEND);
        }
    }
    public function select(){
        $SQL = "SELECT * FROM ";
    }
    public function insert(){
        $SQL = "INSERT INTO ()VALUES()";
    }
    public function update(){
        $SQL = "UPDATE SET ";
    }
    public function delete(){
        $SQL = "DELETE FROM ";
    }
}
$model = new model;


?>