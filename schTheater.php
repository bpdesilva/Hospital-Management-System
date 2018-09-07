<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Receptionist")
{
            header("location: 403.php"); // load page if user is not present

}
include "header.php";//includes header

$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql3 = "SELECT * FROM ward";
        $result3 = mysqli_query($con,$sql3);//connection details + MYSQL Query
        $OUTPUT3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);//Get details to array

        $sql2 = "SELECT * FROM op_theater";
        $result2 = mysqli_query($con,$sql2);//connection details + MYSQL Query
        $OUTPUT2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);//Get details to array

if(isset($_POST['admit_btn'])){
    
    
$sql="INSERT INTO theater_sch(t_id,date,in_time,out_time,d_id,p_id) VALUES('$_POST[theater]','$_POST[date]','$_POST[in_time]','$_POST[out_time]','$_POST[doc]','$_POST[patient]')";
echo '<script>alert("Data Saved Successfully!");</script>';
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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Schedule Theater</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">

                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="schTheater.php">
                                  
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Theater</label>
                            <div class="col-sm-10">
                            <select name="theater" id="class" class="form-control">
                            <option value="" >-- Select Theater --</option>
                            <?php foreach($OUTPUT2 as $value){ ?>
                            <option value="<?php echo $value['t_id']; ?>" ><?php echo $value['t_name']; }?></option>
                            </select>
                                      </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Ward</label>
                            <div class="col-sm-10">
                            <select name="ward" id="class" class="form-control" onChange="getPatient(this.value);getDoctor(this.value);">
                            <option value="" >-- Select Ward --</option>
                            <?php foreach($OUTPUT3 as $value){ ?>
                            <option value="<?php echo $value['no']; ?>" ><?php echo $value['name']; }?></option>
                            </select>
                                      </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Patient</label>
                            <div class="col-sm-10">
                            <select name="patient" id="patient" class="form-control">
                            <option value="" >-- Select Patient --</option>
                            </select>
                                </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Doctor</label>
                            <div class="col-sm-10">
                            <select name="doc" id="doc" class="form-control">
                            <option value="" >-- Select Doctor --</option>
                            </select>
                                </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Select Date</label>
                                      <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">In Time</label>
                                      <div class="col-sm-10">
                                            <input type="time" class="form-control" name="in_time">
                                      </div>
                                  </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Out Time</label>
                                      <div class="col-sm-10">
                                            <input type="time" class="form-control" name="out_time">
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
<script>
function getPatient(val) {
	$.ajax({
	type: "POST",
	url: "dep_admit.php",
	data:'patient='+val,
	success: function(data){
		$("#patient").html(data);
	}
	});
}
    
    function getDoctor(val) {
	$.ajax({
	type: "POST",
	url: "dep_admit.php",
	data:'did='+val,
	success: function(data){
		$("#doc").html(data);
	}
	});
}
</script>


<?php include "footer.php"; //includes footer ?>
