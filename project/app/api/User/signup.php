<?php
 
// get database connection
include_once '../config/database.php';
include_once '../objects/user.php';
$database = new Database();

$db = $database->getConnection();
 

$user = new User($db);

 
// set user property values

$user->username = $_POST['username'];
//$_SESSION["username"] = $user->username ;

//$user->name=$_POST['name'];
$user->password = base64_encode($_POST['password']);

//$user->created = date('Y-m-d H:i:s');

 
// create the user

if(empty($user->username) || empty($user->password)) {
header('Location:/app/index.php?signup=empty');
exit();
}
elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
header('Location:/app/index.php?signup=char');
exit();
}
else{
if($user->signup()){
   
 $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
      "username" => $user->username
    );

//$_SESSION['id']=$user->id;
header('Location:/app/api/web/index.php');
}

else{

    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );

}


}//print_r(json_encode($user_arr));

?>