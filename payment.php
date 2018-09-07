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

        $sql1 = "SELECT * FROM patient";
        $result1 = mysqli_query($con,$sql1);//connection details + MYSQL Query
        $OUTPUT1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);//Get details to array

 
if(empty($_POST['doc_fee']))
{
           $_POST['doc_fee']=0;

}
if(empty($_POST['hos_fee']))
{
           $_POST['hos_fee']=0;

}
if(empty($_POST['lab_fee']))
{
           $_POST['lab_fee']=0;

}
if(empty($_POST['laundary']))
{
           $_POST['laundary']=0;

}
if(isset($_POST['admit_btn'])){
    $total=$_POST['doc_fee'] + $_POST['hos_fee'] + $_POST['lab_fee'] + $_POST['laundary'];
    $sql2 = "INSERT INTO payment(doc_fee,hos_fee,lab_fee,laundary,total,patient_id,issued_by_id) VALUES('$_POST[doc_fee]','$_POST[hos_fee]','$_POST[lab_fee]','$_POST[laundary]','$total','$_POST[patient]','$_SESSION[USERID]')";
    mysqli_query($con,$sql2);
}


mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Payment Invoice</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">

                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="payment.php">
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
                                      <label class="col-sm-2 control-label">Doctor Fee </label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="doc_fee" >
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Hospital Charges</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="hos_fee">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Laboratory Fee</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="lab_fee">
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Laundary Charges</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" name="laundary">
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
