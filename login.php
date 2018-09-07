<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/h.ico">

    <title>Login</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
    <?php 
    session_start();//start session
    $con= mysqli_connect ("localhost","root","","hms");//connect to database
    if(isset($_POST['submit'])){
        $username=($_POST['username']);
        $password=md5($_POST['password']);//encrypt password using php md5
        
        $sql = "SELECT Username,Password,UserType,u_id,Status FROM users
        WHERE Username='$username' AND Password='$password' AND Status='existing'";
        $result = mysqli_query($con,$sql);
        $OUTPUT = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
    //setup session data
    if(mysqli_num_rows($result)==1){
        if($OUTPUT["UserType"]=="Administrator"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        header("location: viewPatient.php"); 
        }
        else if($OUTPUT["UserType"]=="Doctor"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        header("location: viewPatient.php");
        }
        else if($OUTPUT["UserType"]=="Nurse"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        header("location: viewPatient.php");
        }
        else if($OUTPUT["UserType"]=="Receptionist"){
        $sql2 = "SELECT r_id,r_name FROM receptionist
        WHERE r_id='$OUTPUT[u_id]' ";
        $result2 = mysqli_query($con,$sql2);
        $OUTPUT2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        $_SESSION["USER"]= $OUTPUT2["r_name"];
        header("location: viewPatient.php");
        }
    }
        //throw error if login is incorrect
    else if(mysqli_num_rows($result)<1){
        echo '<script>alert("Invalid User! Please Re-Check Your Credentials!");</script>';
    } 
        else echo '<script>alert("No such Data!");</script>';
    }
    ?>

  <body class="login-img3-body">
    <div class="container">
      <form class="login-form" action="login.php" method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" name="username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" >Login</button>
        </div>
      </form>
    </div>
  </body>
</html>
