<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>STUDENT PORTAL</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="./assets/css/style.css">
  
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">

    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">

      <form class="sign-in-htm" action="./api/user/login.php" method="GET">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
	
        </div>
       
</form>


      
      <form class="sign-up-htm" action="./api/user/signup.php" method="POST">
          
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input">
        </div>
           
          <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
 

    </div>

  </div>
</div>
</form>

  <?php
                $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
	
                 if(strpos($fullurl,"signup=empty")==true){
                  echo "<html>
	<body>
	<p  style='color:black;' class='error' > You did not fill in all the fields!</p>
	</body>
	</html>";
	exit();
                 }
                 elseif(strpos($fullurl,"signup=char")==true){
                  echo "<html>
	<body>
	<p style='color:black;' class='error' > You used invalid character!</p>
	</body>
	</html>";
	exit();
                 }
                  elseif(strpos($fullurl,"signup=email")==true){
                  echo "<html>
	<body>
	<p style='color:black;' class='error' > You used invalid email!</p>
	</body>
	</html>";
	exit();
                 }
	elseif(strpos($fullurl,"signup=failed")==true){
                  echo "<html>
	<body>
	<p style='color:black;' class='error' > Invalid username or password!</p>
	</body>
	</html>";
	exit();
                 }
        ?>

     
</body>
</html>