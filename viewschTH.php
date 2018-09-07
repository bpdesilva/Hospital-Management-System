<?php
session_start();//start session
//validate user's type from session 
if(empty($_SESSION["USERTYPE"]))
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
        $sql = "SELECT * FROM theater_sch,doctor,patient,op_theater WHERE theater_sch.t_id=op_theater.t_id AND theater_sch.d_id=doctor.id AND theater_sch.p_id=patient.no";
        $result = mysqli_query($con,$sql);//connection details + MYSQL Query
        $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC);//Get details to array

//If sent query fails
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));//throw error
}


?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Operation Theater Schedules</h3>
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
                                 <th><i class="icon_profile"></i> Name</th>
                                 <th><i class="icon_mobile"></i> Date </th>
                                 <th><i class="icon_pin_alt"></i> Time In </th>
                                <th><i class="icon_pin_alt"></i> Time Out </th>
                                <th><i class="icon_profile"></i> Doctor</th>
                                <th><i class="icon_profile"></i> Patient</th>
                                <th><i class="icon_pin_alt"></i> Status</th>
                              </tr>
                               
                             <?php 
                               //loop through array and load values as rows on the table
                               foreach($OUTPUT as $value)
                               {
                                echo"<tr>";
                                echo"<td>".$value['t_id']."</td>";
                                echo"<td>".$value['t_name']."</td>";
                                echo"<td>".$value['date']."</td>";
                                echo"<td>".$value['in_time']."</td>";
                                echo"<td>".$value['out_time']."</td>";
                                echo"<td>".$value['name']."</td>";
                                echo"<td>".$value['fname']."</td>";
                                echo"<td>".$value['t_status']."</td>";
                                echo"</tr>";
                                }
                                ?>                   
                           </tbody>
                        </table>
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

<?php mysqli_close($con); include "footer.php"; //includes footer ?>
