<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header-->
	<div class="header-w3l">
		<h1>Fill the Form</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Registration</h2>
		<div class="sub-main"> 

				<form action="/app/api/User/register.php" method="post" >  
  				<input placeholder="Name" name="s_name" class="name" type="text" />
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="Email" name="email" class="mail" type="text" />
					<span class="icon2"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>

 <h2 style="color:#FFFF00;">Gender</h2>
    <label class="radio-inline">
      <input type="radio" name="gender"  value="Male"  />Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender"  value="Female" />Female
    </label>		
      <label class="radio-inline">
      <input type="radio" name="gender"  value="other" />Other
    </label>		
 <h2 style="color:#FFFF00;">Sem</h2>
    <label class="radio-inline">
      <input type="radio" name="sem"  value="I"  />I
    </label>
    <label class="radio-inline">
      <input type="radio" name="sem"  value="II" />II
    </label>
    <label class="radio-inline">
      <input type="radio" name="sem"  value="III" />III
    </label>
<label class="radio-inline">
      <input type="radio" name="sem"  value="IV" />IV
    </label>
<label class="radio-inline">
      <input type="radio" name="sem"  value="V" />V
    </label>
<label class="radio-inline">
      <input type="radio" name="sem"  value="VI" />VI
    </label>
<label class="radio-inline">
      <input type="radio" name="sem"  value="VII" />VII
    </label>
<label class="radio-inline">
      <input type="radio" name="sem"  value="VIII" >VIII
    </label>
 

	
  <h2 style="color:#FFFF00;">Department</h2>
   
    <label class="radio-inline">
      <input type="radio" name="department" value="IS" />IS
    </label>
    <label class="radio-inline">
      <input type="radio" name="department" value="CS" />CS
    </label>
    <label class="radio-inline">
      <input type="radio" name="department" value="ME" />ME
    </label>
<label class="radio-inline">
      <input type="radio" name="department" value="ME" />EC
    </label>
<label class="radio-inline">
      <input type="radio" name="department" value="EE" />EE
    </label>
  	
<input placeholder="Address" name="address" class="name" type="text" />
<span class="icon7"><i class="fa fa-address-book" style="font-size:24px" ></i></span><br><br>
<input type="submit" name="back" style="display: block; margin: 30px;  width: 95px; height: 50px; padding: 10px; float: left; border-left: none;" value=" Back" />
 <input  name="submit" type="submit"  value="Register" />
 
</form>
 <?php
                 $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
                 if(strpos($fullurl,"signup=empty")==true){
                  echo "<html>
	<body>
	<p style='color:#fff;' class='error'  > You did not fill in all the fields!</p>
	</body>
	</html>";
	exit();
                 }
                 elseif(strpos($fullurl,"signup=char")==true){
                  echo "<html>
	<body>
	<p style='color:#fff;' class='error' > You used invalid character!</p>
	</body>
	</html>";
	exit();
                 }
                  elseif(strpos($fullurl,"signup=email")==true){
                  echo "<html>
	<body>
	<p style='color:#fff;' class='error' > You used invalid email!</p>
	</body>
	</html>";
	exit();
                 }
	elseif(strpos($fullurl,"signup=failed")==true){
                  echo "<html>
	<body>
	<p style='color:#fff;' class='error' > Invalid username or password!</p>
	</body>
	</html>";
	exit();
	}
	elseif(strpos($fullurl,"signup=unchecked")==true){
	echo "<html>
	<body>
	<p style='color:#fff;' class='error' >Please check the box!</p>
	</body>
	</html>";
	exit();
                 }
	
        ?>
</div>
</div>
<script>
function message(){
alert("Registration successfully..!");
return true;
}
</script>
</body>
</html>