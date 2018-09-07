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
        //MYSQL Query
        $sql1 = "SELECT * FROM ward";
        $result1 = mysqli_query($con,$sql1);//connection details + MYSQL Query
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);//Get details to array

if(isset($_POST['reg_btn'])){
$sql="INSERT INTO nurse(n_name) VALUES('$_POST[name]')";
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}
   $last_id = mysqli_insert_id($con);
}


if(isset($_POST['names'])){
    $name=$_POST['names'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);//convert string to md5
    $sql2="INSERT INTO nurse_ward(n_id,w_id) VALUES('$last_id','$name')";
    $sql3="INSERT INTO users(Username,Password,u_id,UserType,Status) VALUES('$username','$password','$last_id','Nurse','existing')";
    mysqli_query($con,$sql2);
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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Register Nurse</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="addNurse.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nurse Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="name" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="col-sm-2 control-label">Ward</label>
                                      <div class="col-sm-10">
                            <select name="names" id="class" class="form-control">
                            <option value="" >-- Select Ward --</option>
                            <?php foreach($OUTPUT1 as $value){ ?>
                            <option value="<?php echo $value['no']; ?>"><?php echo $value['name']; }?></option>
                            </select></div>
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

<?php include "footer.php";//includes footer ?>
