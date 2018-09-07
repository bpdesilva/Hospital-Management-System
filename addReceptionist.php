<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Doctor" || $_SESSION["USERTYPE"]=="Nurse" || $_SESSION["USERTYPE"]=="Receptionist")
{
            header("location: 403.php"); // load page if user is not present

}
include "header.php";//includes header



$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

if(isset($_POST['reg_btn'])){
$sql="INSERT INTO receptionist(r_name) VALUES('$_POST[name]')";
    
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}
   $last_id = mysqli_insert_id($con);
}


if(isset($_POST['reg_btn'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql3="INSERT INTO users(Username,Password,u_id,UserType,Status) VALUES('$username','$password','$last_id','Receptionist','existing')";
    mysqli_query($con,$sql3);
     echo '<script>alert("Data Sucessfully Saved!");</script>';
}


mysqli_close($con);
?>






<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Register Receptionist</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">

                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="addReceptionist.php">
                                  
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Receptionist Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="name" required>
                                      </div>
                                  </div>
                                  
                            
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="username" required>
                                      </div>
                                  </div>
                                  
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="password"  class="form-control" name="password" required>
                                      </div>
                                  </div>
                                  
                                  
                                <div class="pull-right">
                                  <button type="submit" class="btn btn-primary" name="reg_btn">Submit</button>
                                  </div>
                              </form>
                          </div>
                      </section>
                      

                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

<?php include "footer.php"; //includes footer ?>
