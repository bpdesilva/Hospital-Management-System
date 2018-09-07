<?php
$con= mysqli_connect ("localhost","root","","hms");//connect to database
//If connection fails throw error
if (mysqli_connect_error()){
echo '<script>alert("Databse has failded to connect!");</script>';//database connection fail message
}

        $sql = "SELECT * FROM doctor";
        $result = mysqli_query($con,$sql);//connection details + MYSQL Query
        $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC);//Get details to array
      
if(!mysqli_query($con,$sql)){
die("Error".mysqli_error($con));
}
header('Location: index.php');
echo"Saved Successfully ";

mysqli_close($con);
?>

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> View Doctors</h3>
				</div>
			</div>
              <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Doctor Number </th>
                                 <th><i class="icon_profile"></i> Doctor Name</th>
                                 <th><i class="icon_profile"></i> Specialized Area</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                               
                             <?php 
                                 //loop through array and load values as rows on the table
                               foreach($OUTPUT as $value)
                               {
                                echo"<tr>";
                                echo"<td>".$value['id']."</td>";
                                echo"<td>".$value['name']."</td>";
                                echo"<td>".$value['sp_area']."</td>";;
                                echo"<td>";
                                echo "<div class='btn-group'>";
                                echo"<a class='btn btn-primary' ><i class='icon_plus_alt2'></i></a>";
                                echo"<a class='btn btn-success' ><i class='icon_check_alt2'></i></a>";
                                echo"<a class='btn btn-danger' ><i class='icon_close_alt2'></i></a>";
                                echo"</div>";
                                echo"</td>";
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

<?php mysqli_close($con); include "footer.php"; ?>