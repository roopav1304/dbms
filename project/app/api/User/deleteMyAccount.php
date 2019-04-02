<?php session_start();
$conn=mysqli_connect("localhost","root","roopav@123","project");
if(isset($_POST['submit'])){
$url=$_SERVER['REQUEST_URI'];
//if(strlen($url)==40){
//$name=substr($url,34,40);
//$_SESSION['username']=$name;
$sql1="SELECT id FROM login WHERE username='".$_SESSION['username']."'";
$result=$conn->query($sql1);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$id=$row["id"];
$sql="DELETE FROM login WHERE id=$id" ;
$result=$conn->query($sql);
if($result){
$sql2="DELETE FROM student WHERE id=$id";
$result1=$conn->query($sql2);
$sql3="DELETE FROM enroll WHERE s_id=$id";
$result2=$conn->query($sql3);
$sql4="DELETE FROM academics WHERE s_id=$id";
$result3=$conn->query($sql4);
header('Location:/app/index.php');
//}
}
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-image: url('image5.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
    background-position: center; 
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
 background-color:#4CAF50
 color: white;
}

.topnav-right {
 float: right;
}
.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 17px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
h1 {
  font-size:2em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 400;
  text-align:center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform:  uppercase;
  color: #FB667A;
  text-decoration: none;
}

//.blue { color: #185875; }
.yellow { color: #FFF842; }
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
color:white;
  //color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 70%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #F6C4D2;
  color: #403E10;
  font-weight: solid;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}
@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}

</style>
</head>
<body>
<div class="topnav">
<a href="home.php?uname=$_SESSION['username']">Home</a>
<div class="dropdown">
    <button class="dropbtn">Search
    </button>
    <div class="dropdown-content">
      <a href="course_search.php">Course</a>
      <a href="faculty_search.php">Faculty</a>
      <a href="department_search.php">Department</a>
    </div>
  </div> 
<a href="faculty.php?uname=$_SESSION['username']">Faculty</a>
<a href="department.php?uname=$_SESSION['username']">Departments</a>
<a href="exam.php?uname=$_SESSION['username']">Exam</a>
<a href="academics.php?uname=$_SESSION['username']">Academics</a>
<a href="course.php?uname=$_SESSION['username']">Course</a>
<a href="course_enroll.php?uname=$_SESSION['username']">Enroll</a>
<a href="updation.php?uname=$_SESSION['username']">Update</a>
<a href="deleteMyAccount.php?uname=$_SESSION['username']">Delete My Account</a>
<div class="topnav-right">
<a href="logout.php">Logout</a>
  </div>
</div>
<form action="/app/api/User/deleteMyAccount.php" method="POST" >
<h2><span class="yellow">Are You Sure You Want To Delete Your Account?</span></h2>
<div class="sub-main"> 
 	<button name="submit" class="button">Delete</button>
</div>
</form>
</body>
</html>

