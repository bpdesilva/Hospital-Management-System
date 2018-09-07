<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Doctor" || $_SESSION["USERTYPE"]=="Nurse")
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
//MYSQL Query
$sql="INSERT INTO patient(fname,lnname,dob,contact_no,gender)VALUES('$_POST[fname]','$_POST[lname]','$_POST[dob]','$_POST[cnum]','$_POST[gender]')";
echo '<script>alert("Data Sucessfully Saved!");</script>';//Throws success message
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}

}
mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Register Patient</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="addPatient.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">First Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="fname" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Last Name</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="lname" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Date of Birth</label>
                                      <div class="col-sm-10">
                                            <input type="date" class="form-control" name="dob" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Contact Number</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" placeholder="eg: 077 - XXXXXXX / 071 - XXXXXXX" name="cnum" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Gender</label>
                                      <div class="col-sm-10">
                                    <select class="form-control" name="gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
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