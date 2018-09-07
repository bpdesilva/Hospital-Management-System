<?php
session_start();//start session
//validate usertype from the session
if(empty($_SESSION["USERTYPE"]) || $_SESSION["USERTYPE"]=="Doctor" || $_SESSION["USERTYPE"]=="Nurse")
{
            header("location: 403.php"); 

}
include "header.php";//includes header

$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql = "SELECT * FROM payment,patient,receptionist WHERE payment.patient_id=patient.no && payment.issued_by_id=receptionist.r_id && payment.status='pending'";
        $result = mysqli_query($con,$sql);
        $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC);

      
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}


?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Pending Payments</h3>
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
                                 <th><i class="icon_profile"></i>Payment ID </th>
                                <th><i class="icon_profile"></i>Issued Timestamp </th>
                                <th><i class="icon_profile"></i>Issued By</th>
                                 <th><i class="icon_profile"></i>Patient Name</th>
                                 <th><i class="icon_calendar"></i>Total Amount</th>
                                 <th><i class="icon_mobile"></i> Contact Number</th>
                                  <?php
                                  if($_SESSION["USERTYPE"] == 'Receptionist'){
                                  echo "<th><i class='icon_cogs'></i> Action</th>";}
                                  ?>
                              </tr>
                               
                             <?php 
                               
                               foreach($OUTPUT as $value)
                               {
                                     //loop through array and load values as rows on the table
                                echo"<tr>";
                                echo"<td>".$value['id']."</td>";
                                echo"<td>".$value['issued_time']."</td>";
                                echo"<td>".$value['r_name']."</td>";
                                echo"<td>".$value['fname']." ".$value['lnname']."</td>";
                                echo"<td>".$value['total']."</td>";
                                echo"<td>".$value['contact_no']."</td>";
                                   if($_SESSION["USERTYPE"] == 'Receptionist'){
                                echo"<td>";
                                echo "<div class='btn-group'>";
                                echo "<a href='#myModal-".$value['id']."' data-toggle='modal' class='btn btn-primary' ><i class='icon_plus_alt2'></i></a>"; 
                                echo"</div>";
                                echo"</td>";}
                                echo"</tr>";
                                }
                                ?> 
                                             
                                                       
                           </tbody>
                        </table>
 
              <?php 
                               
                               foreach($OUTPUT as $value)
                               {
              
                           
         

echo " <div aria-hidden ='true' aria-labelledby ='myModalLabel' role ='dialog' tabindex ='-1' id ='myModal-".$value['id']."' class ='modal fade'>";
echo " <div class='modal-dialog'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "            <button aria-hidden='true' data-dismiss='modal' class='close' type='button'>×</button>";
echo "                                              <h4 class='modal-title'>PAYMENT RECIEPT</h4>";
echo "                                          </div>";
echo "                                          <div class='modal-body'>";
echo "                                       <form class='form-horizontal' role='form' method='POST' action='viewPayments.php'>";
echo "                                                  <div class='form-group'>";
echo "<label class='col-sm-8 control-label '><b>RECIEPT ID : </b></label><span class='col-sm-3 control-label'>"  .$value['id']."</span>";
echo "<label class='col-sm-8 control-label'><b>ISSUED BY :   </b></label></label><label class='col-sm-3 control-label'>"  .$value['r_name']."</label>";
echo "<label class='col-sm-8 control-label '><b>PATIENT NAME : </b></label><span class='col-sm-3 control-label'>"  .$value['fname']." ".$value['lnname']."</span>";

                                   
        $issued_time = substr($value['issued_time'], 0, -8);                       
echo "<label class='col-sm-8 control-label'><b>RECIEPT ISSUED ON :   </b></label></label><label class='col-sm-3 control-label'>"  .$issued_time."</label>";
                                   

echo "                                  </div>";

                                   
                      echo "   <table class='table'> ";
                      echo "       <thead> ";           
                      echo "         <tr>";
                      echo "           <th colspan='4'>DESCRIPTION</th>";
                      echo "           <th>AMOUNT</th>";
                      echo "         </tr>";
                      echo "      </thead>";
                      echo "       <tbody>";
                                   if($value['doc_fee']!=0)
                                   {
                                    echo "         <tr class='active'>";
                                    echo "           <td colspan='4'>Doctor Fee</td>";
                                    echo "           <td>Rs.".$value['doc_fee']."</td>";
                                    echo "         </tr>       ";   
                                   }
                                   if($value['hos_fee']!=0)
                                   {
                                    echo "         <tr class='active'>";
                                    echo "           <td colspan='4'>Hospital Charges</td>";
                                    echo "           <td>Rs.".$value['hos_fee']."</td>";
                                    echo "         </tr>       ";   
                                   }
                                   if($value['lab_fee']!=0)
                                   {
                                    echo "         <tr class='active'>";
                                    echo "           <td colspan='4'>Laboratory Fee</td>";
                                    echo "           <td>Rs.".$value['lab_fee']."</td>";
                                    echo "         </tr>       ";   
                                   }
                                   if($value['laundary']!=0)
                                   {
                                    echo "         <tr class='active'>";
                                    echo "           <td colspan='4'>Laundary Charges</td>";
                                    echo "           <td>Rs.".$value['laundary']."</td>";
                                    echo "         </tr>       ";   
                                   }
                                                 
                      echo "         <tr class='warning'>";
                      echo "           <td colspan='4'><b>TOTAL</b></td>";
                      echo "           <td>Rs.".$value['total']."</td>";
                      echo "         </tr> ";                             
                      echo "       </tbody>";
                      echo "     </table>   ";       
 
                                                                         echo "<div class='col-sx-6' align='middle'>";     
                    echo "<img src='img/pay.jpg' align='middle' style='width:120px;height:50px;'></br>"; 
                              echo "</div></br>";            
//                                            <label class='col-sm-8 control-label'><b>RECIEVED BY :   </b></label>
//                                                <label class='col-md-6 control-label'><b>RECIEVED ON :   </b></label>
 echo "<label class='col-sm-12 control-label'><i><b>_________________________</i></b></label></br>";
 echo "<label class='col-sm-12 control-label'><i><b>"  .$_SESSION["USER"]."</i></b></label></br>";
      $date = date_create();
      $recieved= date_format($date, 'Y-m-d H:i:s');
      $rec_time = substr($recieved, 0, -8);
echo "<label class='col-sm-12 control-label'><i><b>"  .$rec_time ."</i></b></label>";

                                   
echo "                                  <div class='form-group'>";                                   
echo"                                   <div class='col-lg-offset-2 col-lg-10'>";
                                   $regvalue="reg_btn".$value['id'];  
                                   $con= mysqli_connect ("localhost","root","","hms");
                                   if(isset($_POST[$regvalue])){ 
                                      $sql5="UPDATE payment SET pay_recby_id = '".$_SESSION["USERID"]."',recieved_time = '".$rec_time."', status = 'complete' WHERE id = '".$value['id']."'";
                                       $result2 = mysqli_query($con,$sql5);    
} 
echo"                                <button type='submit' class='btn btn-primary' name='reg_btn".$value['id']."' onclick='printDiv(myModal-".$value['id'].")'>PROCEED & PRINT</button>";
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
<script>
function printDiv(divID)
{
    var divElements = document.getElementById(divID).innerHTML; // your div
    var newWindow=window.open('','','width=600,height=600');    // new window
    newWindow.document.write(divElements);                      // div → window
    newWindow.document.close();
    newWindow.focus();
    newWindow.print();                                          // printing
    newWindow.close();
}
</script>

<?php mysqli_close($con); include "footer.php"; //includes footer?>
