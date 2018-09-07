<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Nurse" || $_SESSION["USERTYPE"]=="Receptionist")
{
            header("location: 403.php"); // load page if user is not present

}
include "header.php";//includes header



$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql1 = "SELECT * FROM patient";
        $result1 = mysqli_query($con,$sql1);
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);


if(isset($_POST['admit_btn'])){
//Sql query
$sql="INSERT INTO medical_record(description,patient_id,doctor_id) VALUES('$_POST[description]','$_POST[patient]','$_SESSION[USERID]')";
echo '<script>alert("Data Saved Successfully!");</script>';//sucess message     
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}
   $last_id = mysqli_insert_id($con);
}


mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Add Medical Record</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="addMedicalRecord.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Select Patient</label>
                                      <div class="col-sm-10">
                            <select name="patient" id="class" class="form-control">
                            <option value="" >-- Select Patient --</option>
                            <?php foreach($OUTPUT1 as $value){ ?>
                            <option value="<?php echo $value['no']; ?>" ><?php echo $value['fname']." ".$value['lnname']; }?></option>
                            </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" name="description" rows="6"></textarea>
                                      </div>
                                  </div>
                                <div class="pull-right">
                                  <button type="submit" class="btn btn-primary" name="admit_btn">Submit</button>
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

<?php include "footer.php"; //includes footer?>
