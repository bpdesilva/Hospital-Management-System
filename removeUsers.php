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
        //MYSQL Query
        $sql1 = "SELECT * FROM users WHERE UserType!='Administrator'AND Status='existing'";
        $result1 = mysqli_query($con,$sql1);//connection details + MYSQL Query
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);//Get details to array



if(isset($_POST['admit_btn'])){
$sql3="UPDATE users
SET status = 'removed'
WHERE id = $_POST[user]";
    mysqli_query($con,$sql3);

}

mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Remove Users</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="removeUsers.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Select User</label>
                                      <div class="col-sm-10">
                            <select name="user" id="class" class="form-control">
                            <option value="" >-- Select User --</option>
                            <?php foreach($OUTPUT1 as $value){ ?>
                            <option value="<?php echo $value['id']; ?>" ><?php echo $value['Username']." | ".$value['UserType']; }?></option>
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


<?php include "footer.php"; //includes footer ?>
