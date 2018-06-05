<?php

session_start();

function generateToken( $formName )
{

return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function checkToken( $token)
{

    return $token ===$_SESSION['csrf_token'];
}


if (!$_SESSION["user"]) {

    header('Location: index.php');
    exit();

} else {

    echo '<center><div class="container">  <div class="alert alert-success alert-dismissible fade in">

    <strong>Welcome! </strong>
  </div></div></center>';

}
if (isset($_POST['csrf_token']) && isset($_POST['fname']) && isset($_POST['lname'])) {

    if (checkToken($_POST['csrf_token'])) {
      echo '<center><div class="container">  <div class="alert alert-success alert-dismissible fade in">
Profile Successfuly Updated!
    </div></div></center>';


    } else {

      echo '<center><div class="container">  <div class="alert alert-danger alert-dismissible fade in">

      Invalid CSRF Token Detected!
    </div></div></center>';
    }

}



?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

	<div class="background-wrap">
	<div class="background"></div>
	</div>
	
<form id="accesspanel" method="post">
  <h1 id="litheader">UPDATE USER</h1>
  <div class="inset">
    <p>
      <input type="text" name="fname" id="fname" placeholder="First Name">
    </p>
    <p>
      <input type="text" name="lname" id="lname" placeholder="Last Name">
    </p>
   
	<input id="login-username" type="hidden" class="form-control" name="csrf_token" value=<?php echo '"' . generateToken('sec') . '"';?>>
   
    <!--<input class="loginLoginValue" type="hidden" name="service" value="login" />-->
  </div>
  <p class="p-container">
    <input type="submit" name="update" id="go" value="Update">
	<center><a href="logout.php">Logout</a></center>
  </p>
  
  
  
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>

   