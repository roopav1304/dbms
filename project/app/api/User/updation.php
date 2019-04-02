 <?php session_start();
  //  include_once '../objects/user.php';
    $conn=mysqli_connect("localhost","root","roopav@123","project");
//$user=new User($conn);    
if(isset($_POST['submit'])){
     $c_id=$_POST['c_id'];
     $grade=$_POST['grade'];
     $attendance=$_POST['attendance'];
     $sql1="SELECT id FROM login WHERE username='".$_SESSION['username']."'";
     $result=$conn->query($sql1);
     if($result->num_rows > 0){
     while($row=$result->fetch_assoc()){
        $id=$row["id"];
}
     $sql="INSERT INTO academics(s_id,c_id,grade,attendance) values($id,$c_id,'".$grade."','".$attendance."')";
     if(mysqli_query($conn,$sql)){
        header('Location:/app/api/User/updation.php?uname=$_SESSION["username"]&update=success');
        exit();
     }
}
}
if(isset($_POST['update'])){
     $c_id=$_POST['c_id'];
     $grade=$_POST['grade'];
     $attendance=$_POST['attendance'];
     $sql1="SELECT id FROM login WHERE username='".$_SESSION['username']."'";
     $result=$conn->query($sql1);
     if($result->num_rows > 0){
     while($row=$result->fetch_assoc()){
        $id=$row["id"];
}
$sql2="UPDATE academics SET grade='".$grade."',attendance='".$attendance."' WHERE s_id=$id AND c_id=$c_id";
if(mysqli_query($conn,$sql2)){
        header('Location:/app/api/User/updation.php?uname=$_SESSION["username"]&update=success');
        exit();
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
  font-weight: 300;
  text-align: center;
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

.blue { color: #185875; }
.yellow { color: #FFF842; }

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
	  width: 80%;
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
body{
  padding: 30px;
  
//background-image: url(data:image/png;base64,...==);
}
 
a{ 

  color:#000;

}

ul{ 

  list-style-type: none;

  margin-top: -20px;
}

.box{ 

  position: relative;

  z-index: 1;
  
width: 456px;

  height: 380px; 

  margin:50px auto 0;

  text-align: center;

  color:#fff;

  text-shadow:0 1px 0 #333; 
 
 background:

    -webkit-radial-gradient(0 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),

    -webkit-radial-gradient(100% 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),

    -webkit-radial-gradient(100% 0, circle, rgba(204,0,0,0) 29px, #d05353 29px),
 
   -webkit-radial-gradient(0 0, circle, rgba(204,0,0,0) 29px, #d05353 29px);

  background:
    -moz-radial-gradient(0 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),

    -moz-radial-gradient(100% 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
 
   -moz-radial-gradient(100% 0, circle, rgba(204,0,0,0) 29px, #d05353 29px),
 
   -moz-radial-gradient(0 0, circle, rgba(204,0,0,0) 29px, #d05353 29px);
 
 background:
    -o-radial-gradient(0 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
   
 -o-radial-gradient(100% 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
  
  -o-radial-gradient(100% 0, circle, rgba(204,0,0,0) 29px, #d05353 29px),
   
 -o-radial-gradient(0 0, circle, rgba(204,0,0,0) 29px, #d05353 29px);	

  background:
    -ms-radial-gradient(0 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
  
  -ms-radial-gradient(100% 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
  
  -ms-radial-gradient(100% 0, circle, rgba(204,0,0,0) 29px, #d05353 29px),
   
 -ms-radial-gradient(0 0, circle, rgba(204,0,0,0) 29px, #d05353 29px);	

  background:
    radial-gradient(0 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
   
 radial-gradient(100% 100%, circle, rgba(204,0,0,0) 29px, #d05353 29px),
  
  radial-gradient(100% 0, circle, rgba(204,0,0,0) 29px, #d05353 29px),
  
  radial-gradient(0 0, circle, rgba(204,0,0,0) 29px, #d05353 29px);	

  background-position: bottom left, bottom right, top right, top left;
 
 background-size: 50% 50%;
 
 background-repeat: no-repeat;

}

.tag{ 
 
 position: relative; 
 
 top: -5px; 
 
 left: 50%; 

  margin-left: -100px; 
 
 width: 184px; 
 
 height: 87px;
 
 color:#fff; 

  font-size: 30px; 
 
 font-weight: bold; 
 
 line-height: 87px; 
 
 text-shadow:0 -1px 0 rgba(0,0,0,.2);

  background-color: #b5ae63;
 
 background-size: 2px 2px;
 
 background-image: -webkit-linear-gradient(45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a), 
 
   -webkit-linear-gradient(-45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a);
 
 background-image: -moz-linear-gradient(45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a), 
  
  -moz-linear-gradient(-45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a);

  background-image: -o-linear-gradient(45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a), 
  
  -o-linear-gradient(-45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a);
 
 background-image: -ms-linear-gradient(45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a), 
 
   -ms-linear-gradient(-45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a);

  background-image: linear-gradient(45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a), 
 
  linear-gradient(-45deg, #c0b96a 25%, transparent 25%, transparent 75%, #c0b96a 75%, #c0b96a);	
	
}

.tag:after,
.tag:before{

  position:absolute;

  left:0;
 
  content: ""; 

  width: 100%; 
  
z-index: 8

}

.tag:after{

  height: 30px; 

  top: 0px; 

  background: -webkit-linear-gradient(top,rgba(226,217,124,0) 0%,rgba(226,217,124,1) 40%,rgba(226,217,124,1) 60%,rgba(226,217,124,0) 100%);

  background: -moz-linear-gradient(top,rgba(226,217,124,0) 0%,rgba(226,217,124,1) 40%,rgba(226,217,124,1) 60%,rgba(226,217,124,0) 100%);
 
 background: -o-linear-gradient(top,rgba(226,217,124,0) 0%,rgba(226,217,124,1) 40%,rgba(226,217,124,1) 60%,rgba(226,217,124,0) 100%);

  background: -ms-linear-gradient(top,rgba(226,217,124,0) 0%,rgba(226,217,124,1) 40%,rgba(226,217,124,1) 60%,rgba(226,217,124,0) 100%);

  background: linear-gradient(top,rgba(226,217,124,0) 0%,rgba(226,217,124,1) 40%,rgba(226,217,124,1) 60%,rgba(226,217,124,0) 100%);

}

.tag:before{ 
 
 height:8px; 

  bottom: -5px; 

  z-index: -1;
  
  background: -webkit-radial-gradient(ellipse closest-side, #b8b165, #b8b165 0%, #b8b165 70%,#732e2e 99%, transparent);
 
 background: -moz-radial-gradient(ellipse closest-side, #b8b165, #b8b165 0%, #b8b165 70%,#732e2e 99%, transparent);

  background: -o-radial-gradient(ellipse closest-side, #b8b165, #b8b165 0%, #b8b165 70%,#732e2e 99%, transparent);

  background: -ms-radial-gradient(ellipse closest-side, #b8b165, #b8b165 0%, #b8b165 70%,#732e2e 99%, transparent);
  
background: radial-gradient(ellipse closest-side, #b8b165, #b8b165 0%, #b8b165 70%,#732e2e 99%, transparent);
  
background-size:8px 8px;

}

form div:nth-of-type(3):before,
form div:nth-of-type(5):before{ 

  content: ""; 

  display: block;   
 
  width: 100%; 
 
 height: 5px;
  
border:1px solid #c9938a;
  
border-color:#c9938a transparent;

}

form{ 

  margin: 0 20px;
  
line-height: 30px;

}

form input:not([type="checkbox"]){
 
  background: #aa3e3e; 

  box-shadow:inset 0 0 5px rgba(0,0,0,.5),0 1px 1px #da6262; 

  border: none;
 
  height: 30px; 

  width: 100%; 
 
 padding-left: 5px; 

  padding-right: -5px; 

  margin:20px 0;

  -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;

  -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
  
-o-transition: border linear 0.2s, box-shadow linear 0.2s;

  -ms-transition: border linear 0.2s, box-shadow linear 0.2s;

  transition: border linear 0.2s, box-shadow linear 0.2s;
 
 -webkit-box-sizing: border-box;

  -moz-box-sizing: border-box;

  -o-box-sizing: border-box;
 
 -ms-box-sizing: border-box;

  box-sizing: border-box;

}

form input:not([type="checkbox"]):focus{

  outline: 0 none;

  box-shadow: inset 0 1px 3px rgba(255,255,255,0.1), 0 0 8px rgba(255,255,255, 0.6);

}

::-webkit-input-placeholder {
 
 color:#d6aaaa;
  
font-weight: bold;

}

form .btn{ 

  position: relative;

  top: 0;	
 
 border: none;
 
  width: 112px; 
 
 height: 44px; 

  font-weight: bold;
  
color: #b74242;
  
text-shadow:0 -1px 0 #000;
 
  border-radius: 3px; 

  box-shadow: 0 -1px 0 #feeae7,0 1px 0 #976159; 

  background: -webkit-linear-gradient(top,#f8d3cf,#dfafa8);
 
  background: -moz-linear-gradient(top,#f8d3cf,#dfafa8);
 
  background: -o-linear-gradient(top,#f8d3cf,#dfafa8);
 
  background: -ms-linear-gradient(top,#f8d3cf,#dfafa8); 
  
background: linear-gradient(top,#f8d3cf,#dfafa8); 
 
 margin-top: 20px;
  
-webkit-transition: all 0.25s ease-out 0.05s;

  -moz-transition: all 0.25s ease-out 0.05s;

  -o-transition: all 0.25s ease-out 0.05s;
 
 -ms-transition: all 0.25s ease-out 0.05s;
 
 transition: all 0.25s ease-out 0.05s;

}

form .btn:hover{
  
top: 1px;
 
 box-shadow: 0 -1px 0 #feeae7,0 2px 0 #976159; 

  background: -webkit-linear-gradient(top,#dfafa9,#e1b2ac); 	

  background: -moz-linear-gradient(top,#dfafa9,#e1b2ac); 

  background: -o-linear-gradient(top,#dfafa9,#e1b2ac);
  background: -ms-linear-gradient(top,#dfafa9,#e1b2ac); 

  background: linear-gradient(top,#dfafa9,#e1b2ac); 	

}

</style>
</head>
<body>
<div class="topnav">
<a href='home.php?uname=$_SESSION["username"]'>Home</a>
<div class="dropdown">
    <button class="dropbtn">Search
    </button>
    <div class="dropdown-content">
      <a href="course_search.php">Course</a>
      <a href="faculty_search.php">Faculty</a>
      <a href="department_search.php">Department</a>
    </div>
  </div> 
<a href='faculty.php?uname=$_SESSION["username"]'>Faculty</a>
<a href='department.php?uname=$_SESSION["username"]'>Departments</a>
<a href='exam.php?uname=$_SESSION["username"]'>Exam</a>
<a href='academics.php?uname=$_SESSION["username"]'>Academics</a>
<a href='course.php?uname=$_SESSION["username"]'>Course</a>
<a href='course_enroll.php?uname=$_SESSION["username"]'>Enroll</a>
<a href='updation.php?uname=$_SESSION["username"]'>Update</a>
<a href="deleteMyAccount.php?uname=$_SESSION['username']">Delete My Account</a>
<div class="topnav-right">
<a href="logout.php">Logout</a>
  </div>
</div>
<h1><span class="yellow">Update form</span></h1>
<div class="box">
  
<form action="/app/api/user/updation.php" method="POST">

<div>
      <input type="number" name="c_id"  placeholder="Course_ID:">
 </div>

    <div>
      <input type="text" name="grade"  placeholder="Grade:">
    </div>

     <div>
      <input type="text" name="attendance"  placeholder="Attendance:">
    </div>

    <div>
      <button type="submit" name="submit" class="btn">SUBMIT </button>
  <button type="submit" name="update" class="btn">UPDATE </button>  </div>
 
    
 </form>

</div>

<?php
$fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
	
                 if(strpos($fullurl,"update=success")==true){
echo "<html>
	<body>
	<p  style='color:white;' class='error' >Updation successfull!</p>
	</body>
	</html>";
}
?>
 

</body>


</html>




