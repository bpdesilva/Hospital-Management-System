<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Doctor" || $_SESSION["USERTYPE"]=="Nurse")
{
            header("location: 403.php");// load page if user is not present 

}
include "header.php";//includes header

$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql1 = "SELECT * FROM patient WHERE status='not-admitted' ";// MYSQL Query
        $result1 = mysqli_query($con,$sql1);//connection details + MYSQL Query
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);//Get details to array

        $sql2 = "SELECT * FROM ward";
        $result2 = mysqli_query($con,$sql2);//connection details + MYSQL Query
        $OUTPUT2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);//Get details to array

if(isset($_POST['admit_btn'])){
    // MYSQL Query
$sql="INSERT INTO admitted(p_id,ref_by,w_no,r_no,ref_to) VALUES('$_POST[patient]','$_POST[refby]','$_POST[ward]','$_POST[room]','$_POST[doc]')";
$sql3="UPDATE room
SET status = 'taken'
WHERE no = $_POST[room]";
    mysqli_query($con,$sql3);
  
    // MYSQL Query
$sql4="UPDATE patient
SET status = 'admitted'
WHERE no = $_POST[patient]";
    mysqli_query($con,$sql4);
 echo '<script>alert("Data Sucessfully Saved!");</script>';    
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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Admit Patient</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">

                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="admitPatient.php">
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
                                      <label class="col-sm-2 control-label">Refered By</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="refby" required>
                                      </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Ward</label>
                            <div class="col-sm-10">
                            <select name="ward" id="class" class="form-control" onChange="getRoom(this.value);getDoctor(this.value);">
                            <option value="" >-- Select Ward --</option>
                            <?php foreach($OUTPUT2 as $value){ ?>
                            <option value="<?php echo $value['no']; ?>" ><?php echo $value['name']; }?></option>
                            </select>
                                      </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Select Room</label>
                            <div class="col-sm-10">
                            <select name="room" id="room" class="form-control">
                            <option value="" >-- Select Ward --</option>
                            </select>
                                </div>
                                  </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Refered To</label>
                            <div class="col-sm-10">
                            <select name="doc" id="doc" class="form-control">
                            <option value="" >-- Select Doctor --</option>
                            </select>
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
function getRoom(val) {
	$.ajax({
	type: "POST",
	url: "dep_admit.php",
	data:'room_no='+val,
	success: function(data){
		$("#room").html(data);
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
