<?php
 
 
// get database connection

include_once "../config/database.php";

 
// instantiate register object

include_once "../objects/user.php";
 

$database = new Database();

$db = $database->getConnection();
 

$register = new User($db);

 
// set register property values

$register->s_name = $_POST['s_name'];

$register->gender = $_POST['gender'];

$register->email = $_POST['email'];

$register->sem=$_POST['sem'];
$register->department= $_POST['department'];

$register->address = $_POST['address'];

//$_SESSION['s_name']=$register->s_name;
//$_SESSION['gender']=$register->gender;
//$_SESSION['sem']=$register->sem;
//$_SESSION['department']=$register->department;
//$_SESSION['address']=$register->address;
//$_SESSION['email']=$register->email;
 
// create the register

if(isset($_POST['back'])){
header('Location:/app/index.php');
}
if(isset($_POST['submit']))
{ 
if(empty($register->s_name) ) {
header('Location:/app/api/web/index.php?signup=empty');
exit();
}
if($register->sem == null || $register->department == null || $register->gender == null){
header('Location: /app/api/web/index.php?signup=unchecked');
exit();
}
if(!preg_match("/^[a-zA-Z]*$/",$register->s_name)){
header('Location:/app/api/web/index.php?signup=char');
exit();
}
if(!filter_var($register->email , FILTER_VALIDATE_EMAIL)){
header('Location:/app/api/web/index.php?signup=email');
exit();
}
if($register->register()){
  
 $register_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
  "id"=>$register->id,      "s_name" => $register->s_name,
      "sem" => $register->sem,  "department"=>$register->department
,  "address"=>$register->address,   "email"=>$register->email  ,  "gender"=>$register->gender  );

//$_SSEION["id"]=$register->id;
header('Location:/app/index.php');
}

else{

 $register_arr=array(
        "status" => false,
        "message" => "Please fill the form properly!"
    );

header('Location:/app/api/web/index.php');
}

}
//print_r(json_encode($register_arr));

?>
