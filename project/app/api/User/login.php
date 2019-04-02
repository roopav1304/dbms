<?php session_start();
// include database and object files

include_once '../config/database.php';

include_once '../objects/user.php';

 
// get database connection

$database = new Database();

$db = $database->getConnection();

 
// prepare user object

$user = new User($db);

// set ID property of user to be edited

if(isset($_GET['username']))
{
$user->username = $_GET['username'];
$name=$user->username;
$_SESSION['username']=$user->username;
$user->password = base64_encode($_GET['password']);

}
// read the details of user to be edited
if(empty($user->username) || empty($user->password)) {
header('Location:/app/index.php?signup=empty');
exit();
}
elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
header('Location:/app/index.php?signup=char');
exit();
}
$stmt = $user->login();

if($stmt->rowCount() > 0){
    
// get retrieved row
   
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
 // create array
  
 $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "username" => $row['username']
);
//$_SESSION['id']=$register->id;
 header("Location:home.php?uname=$name");
}

else{

    header('Location:/app/index.php?signup=failed');
}

// make it json format

//print_r(json_encode($user_arr));

?>
