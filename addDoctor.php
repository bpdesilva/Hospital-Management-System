<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Doctor" || $_SESSION["USERTYPE"]=="Nurse" || $_SESSION["USERTYPE"]=="Receptionist")
{
            header("location: 403.php"); //If there are no users accesss fobbiden page will be loaded

}
include "header.php";//includes header



$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql1 = "SELECT * FROM ward";//MYSQL Query
        $result1 = mysqli_query($con,$sql1);//Connection details + MYSQL query
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);//Get all data to an array

if(isset($_POST['reg_btn'])){
$sql="INSERT INTO doctor(name,sp_area) VALUES('$_POST[name]','$_POST[sparea]')"; // Send data to database
    
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}
   $last_id = mysqli_insert_id($con);
}
if(isset($_POST['names'])){
    $name=$_POST['names'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql2="INSERT INTO doctor_ward(d_id,w_no) VALUES('$last_id','$name')";
    $sql3="INSERT INTO users(Username,Password,u_id,UserType,Status) VALUES('$username','$password','$last_id','Doctor','existing')";
    mysqli_query($con,$sql2);
    mysqli_query($con,$sql3);
    echo '<script>alert("Data Sucessfully Saved!");</script>';//sucess message
}
mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Register Doctor</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="addDoctor.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Doctor Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="name" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Specialized Area</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="sparea" required>
                                      </div>
                                  </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ward</label>
                                    <div class="col-sm-10">
                            <select name="names" id="class" class="form-control">
                            <option value="" >-- Select Ward --</option>
                            <?php foreach($OUTPUT1 as $value){ ?>
                            <option value="<?php echo $value['no']; ?>"><?php echo $value['name']; }?></option>
                            </select>
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

<?php include "footer.php"; ?>//loads footer section
