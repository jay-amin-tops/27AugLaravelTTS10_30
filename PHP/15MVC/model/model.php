<?php
date_default_timezone_set('Asia/Kolkata');
// error_reporting(0);
class model{
    // public $Connection = "test";
    public $Connection = "";
    // public $Connection = new mysqli("host_name","username","password","databasename");
    // public $Connection = new mysqli("localhost","root","","masterdatabase");
    public function __construct() {
        // echo "called const";
        try {
            $this->Connection = new mysqli("localhost","root","","masterdatabase");
            // echo "<pre>";
            // print_r($this->Connection);
        } catch (Exception $e) {
            // echo "<pre>";
            // print_r($e->getMessage());
            if (!file_exists("log")) {
                mkdir("log");
            }
            $msg = "Error DateTime =>> ".date('d-m-Y H:i:s A');
            $msg .= PHP_EOL."Error Msg =>> ".$e->getMessage();
            file_put_contents("log/".date('d_m_Y')."_log.txt",PHP_EOL.$msg.PHP_EOL,FILE_APPEND);
            echo $e->getMessage();
            exit;
        }
    }
    public function login($uname,$pass){
        // $SQL = "SELECT * FROM users WHERE username='test' AND password ='test'";
        // $SQL = 'SELECT * FROM users WHERE username=$uname';
        $SQL = "SELECT * FROM users WHERE password ='$pass' AND (username='$uname' OR email='$uname' OR mobile='$uname')";
        // $SQLEx = $this->Connection->query("SELECT * FROM users WHERE password ='$pass' AND (username='$uname' OR email='$uname' OR mobile='$uname')");
        $SQLEx = $this->Connection->query($SQL);
        // echo "<pre>";
        // print_r($SQLEx);
        // print_r($SQLEx->num_rows);
        // echo "<br>";
        if ($SQLEx->num_rows > 0) {
            echo "inside if";
            // $FetchData = $SQLEx->fetch_all(); // numeric Array 
            // $FetchData = $SQLEx->fetch_array();  // numeric and assoc
            // $FetchData = $SQLEx->fetch_assoc();  //  assoc
            // $FetchData = $SQLEx->fetch_field();  //  table column
            // $FetchData = $SQLEx->fetch_row();  //  single and only numeric array
            $FetchData = $SQLEx->fetch_object();  //  object res
            // print_r($FetchData);
            $Respose["Code"] = "1";
            $Respose["Msg"] = "Success";
            $Respose["Data"] = $FetchData;
        } else {
            $Respose["Code"] = "0";
            $Respose["Msg"] = "Try again";
            $Respose["Data"] = 0;
        }
        return $Respose;
    }
    public function select($tbl,$where=""){
        $SQL = "SELECT * FROM $tbl"; //this is a dynamic parameter recv krya 
        if ($where != "") {
            $SQL .= " WHERE "; 
            foreach ($where as $key => $value) {
                $SQL .= " $key = $value AND"; 
            }
            $SQL = rtrim($SQL,"AND");
        }
        // echo $SQL;
        // exit; 
        $SQLEx = $this->Connection->query($SQL);
        if ($SQLEx->num_rows > 0) {
            while ($Fetch = $SQLEx->fetch_object()) {
                $FetchData[] = $Fetch;
            }
            $Respose["Code"] = "1";
            $Respose["Msg"] = "Success";
            $Respose["Data"] = $FetchData;
        } else {
            $Respose["Code"] = "0";
            $Respose["Msg"] = "Try again";
            $Respose["Data"] = 0;
        }
        return $Respose;
        // echo $SQL; 
    }
    public function insert($tbl,$data){
        // echo "<pre>";
        // print_r($data);
        $KeysData = implode(",",array_keys($data)) ;
        $ValsData = implode("','",$data) ;
        // print_r($KeysData);
        // echo "</pre>";
        $SQL = "INSERT INTO $tbl($KeysData)VALUES('$ValsData')";
        $SQLEx = $this->Connection->query($SQL);
        if ($SQLEx > 0) {
            $Respose["Code"] = "1";
            $Respose["Msg"] = "Success";
            $Respose["Data"] = "1";
        } else {
            $Respose["Code"] = "0";
            $Respose["Msg"] = "Try again";
            $Respose["Data"] = 0;
        }
        return $Respose;
    }
    public function update($tbl,$data,$where){
 echo "<pre>";
        print_r($data);

        // $kd=implode("','",array_keys($data));
        // $vd=implode("','",$data);
        // array_merge($kd,)
        // for ($i=0; $ ; $i++) { 
            # code...
        
//         UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;
     

$SQL = "UPDATE users SET ";
foreach ($data as $key => $value) {
    $SQL.=" $key ='$value',";
    // rtrim();

}
$SQL= rtrim($SQL,",");
$SQL .= " WHERE "; 
foreach ($where as $key => $value) {
    $SQL .= " $key = $value AND"; 
}
$SQL = rtrim($SQL,"AND");
echo $SQL;
//    print_r($kd);
 }
    public function delete(){
        $SQL = "DELETE FROM ";
    }
}
// $model = new model;
// $model->select("user");
// echo "<br>";
// $model->select("city");
// echo "<br>";
// $model->select("state");
// echo "<br>";
// $model->select("country");
// echo "<br>";
// $res = $model->login('admin',"123");
// print_r($res);
// echo "<br>";
// $res = $model->update('users',array("username"=>"test","password"=>"123",
// "gender"=>"Male","city"=>"1","hobby"=>"Circket,Music","address"=>"test"),array("userid"=>5));
// print_r($res);
// echo "<br>";

?>