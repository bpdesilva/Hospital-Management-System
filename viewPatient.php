<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]))
{
            header("location: 403.php"); 

}
include "header.php";//includes header

$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql = "SELECT * FROM patient";
        $result = mysqli_query($con,$sql);//connection details + MYSQL Query
        $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC);//Get details to array

      
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}


?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> View Patient</h3>
				</div>
			</div>
              <section class="panel">
                                  <header class="panel-heading">
                                      Filter Search:
                                  </header>
                                  <div class="panel-body">
                                      <form action="#" method="get" accept-charset="utf-8">
                            <div class="btn-row">
                                <div class="col-lg-3">
                                <input type="text" class="form-control"
                                       id="myInput" placeholder="Search here..">
                                </div>
                            </div>
                                      </form>
                                  </div>

                              </section>
              <table class="table table-striped table-advance table-hover" id="myTable">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID </th>
                                 <th><i class="icon_profile"></i> First Name</th>
                                 <th><i class="icon_profile"></i> Last Name</th>
                                 <th><i class="icon_calendar"></i> Date of Birth</th>
                                 <th><i class="icon_mobile"></i> Contact Number</th>
                                 <th><i class="icon_pin_alt"></i> Gender</th>
                                                                   <?php
                                  //Load editable icon based on user
                                  if($_SESSION["USERTYPE"] == 'Receptionist' || $_SESSION["USERTYPE"] == 'Administrator'){
                                  echo "<th><i class='icon_cogs'></i> Action</th>";}
                                  ?>
                              </tr>
                               
                             <?php 
                               
                               foreach($OUTPUT as $value)
                               {
                                echo"<tr>";
                                echo"<td>".$value['no']."</td>";
                                echo"<td>".$value['fname']."</td>";
                                echo"<td>".$value['lnname']."</td>";
                                echo"<td>".$value['dob']."</td>";
                                echo"<td>".$value['contact_no']."</td>";
                                echo"<td>".$value['gender']."</td>";
                                   //show update button based on user type
                                   if($_SESSION["USERTYPE"] == 'Receptionist' || $_SESSION["USERTYPE"] == 'Administrator'){
                                echo"<td>";
                                echo "<div class='btn-group'>";
                                echo "<a href='#myModal-".$value['no']."' data-toggle='modal' class='btn btn-primary' ><i class='icon_plus_alt2'></i></a>"; 
                                echo"</div>";
                                echo"</td>";}
                                echo"</tr>";
                                }
                                ?> 
                                             
                                                       
                           </tbody>
                        </table>
              <?php 
                               //load data to model
                               foreach($OUTPUT as $value)
                               {
              
                           
         
                    
echo " <div aria-hidden ='true' aria-labelledby ='myModalLabel' role ='dialog' tabindex ='-1' id ='myModal-".$value['no']."' class ='modal fade'>";
echo " <div class='modal-dialog'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "            <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>";
echo "                                              <h4 class='modal-title'>Edit Patient</h4>";
echo "                                          </div>";
echo "                                          <div class='modal-body'>";
echo "                                       <form class='form-horizontal' role='form' method='POST' action='viewPatient.php'>";
echo "                                                  <div class='form-group'>";
echo "                                      <label class='col-lg-2 control-label'>Patient Number</label>";
echo "                                      <div class='col-lg-10'>";
echo "                      <input type='number' value='".$value['no']."' class='form-control'  name='num".$value['no']."'>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";
echo "                                      <label class='col-sm-2 control-label'>First Name</label>";
echo "                                      <div class='col-sm-10'>";
echo "                       <input type='text' value='".$value['fname']."' class='form-control' name='fname".$value['no']."'>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";
echo "                                      <label class='col-sm-2 control-label'>Last Name</label>";
echo "                                      <div class='col-sm-10'>";
echo "                       <input type='text' value='".$value['lnname']."' class='form-control' name='lname".$value['no']."'>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";
echo "                                      <label class='col-sm-2 control-label'>Date of Birth</label>";
echo "                                      <div class='col-sm-10'>";
echo "                      <input type='date' value='".$value['dob']."' class='form-control' name='dob".$value['no']."'>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";
echo "                                      <label class='col-sm-2 control-label'>Contact Number</label>";
echo "                                      <div class='col-sm-10'>";
echo "                    <input type='text'  class='form-control' value='".$value['contact_no']."' name='cnum".$value['no']."'>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";
echo "                                      <label class='col-sm-2 control-label'>Gender</label>";
echo "                                      <div class='col-sm-10'>";
echo "                                    <select class='form-control' name='gender".$value['no']."'>";
echo "                                        <option value='Male'>Male</option>";
echo "                                        <option value='Female'>Female</option>";
echo "                                    </select>";
echo "                                      </div>";
echo "                                  </div>";
echo "                                  <div class='form-group'>";                                   
echo"                                   <div class='col-lg-offset-2 col-lg-10'>";
                                   $regvalue="reg_btn".$value['no'];
                                   $fname="fname".$value['no'];
                                   $lname="lname".$value['no'];
                                   $dob="dob".$value['no'];
                                   $cnum="cnum".$value['no'];
                                   $gender="gender".$value['no'];    
                                   if(isset($_POST[$regvalue])){
                                       $sql5="UPDATE patient SET fname = '$_POST[$fname]', lnname = '$_POST[$lname]', dob = '$_POST[$dob]', contact_no = '$_POST[$cnum]', gender = '$_POST[$gender]'
                                       WHERE no = '$value[no]'";
                                       if(!mysqli_query($con,$sql5)){
                                           die("Error".mysqli_error($con));
}
  
} 
echo"                                <button type='submit' class='btn btn-primary' name='reg_btn".$value['no']."'>Submit</button>";
echo"                                  </div>";
echo"                                  </div>";                                   
                                   
                                   
echo "                                              </form>";
echo "                                          </div>";
echo "                                      </div>";
echo "                                  </div>";
echo "                              </div>";
        
              
                                }
                                ?> 
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

<script>
 //code to filter results from the table      
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        var thirdCol = rows[i].cells[2].textContent.toUpperCase();
        var fouthCol = rows[i].cells[3].textContent.toUpperCase();
        var fifthCol = rows[i].cells[4].textContent.toUpperCase();
        var sixithCol = rows[i].cells[5].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 ||
            fouthCol.indexOf(filter) > -1 ||fifthCol.indexOf(filter) > -1 ||sixithCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);


</script>

<?php mysqli_close($con); include "footer.php"; //includes footer?>
