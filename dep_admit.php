<?php
$con= mysqli_connect ("localhost","root","","hms");//connect to database
//Get data
if(!empty($_POST["room_no"])) {
	$sql ="SELECT * FROM ward_room,room WHERE w_no = '" . $_POST["room_no"] . "' && ward_room.r_num=room.no && room.status='free' ";
	$result = mysqli_query($con,$sql);//MYSQL Query + Connection location
    $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC); //Load data to an array
?>
	<option value="">-- Select Room --</option>
<?php
    //loop through the data
	foreach($OUTPUT as $rooms) {

?>
	<option value="<?php echo $rooms['no']; ?>"><?php echo $rooms['name']."  |  ".$rooms['type']; 
    //Load data to drop down?></option>
<?php
	}
}
?>
<?php
//Get data based on id
if(!empty($_POST["did"])) {
    //MYSQL QUERY
    $sql2 ="SELECT * FROM doctor_ward,doctor WHERE w_no = '" . $_POST["did"] . "' && doctor_ward.d_id=doctor.id";
	$result2 = mysqli_query($con,$sql2);//MYSQL Query + Connection details
    $OUTPUT2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);//Load data to an array  
?>


<option value="">-- Select Doctor --</option>
<?php
	foreach($OUTPUT2 as $docs) {

?>
    
	<option value="<?php echo $docs['id']; ?>"><?php echo $docs['name']."  |  ".$docs['sp_area']; ?></option>
<?php
	}
}

?>


<?php
if(!empty($_POST["nid"])) {
    $sql2 ="SELECT * FROM nurse_ward,nurse WHERE w_id = '" . $_POST["nid"] . "' && nurse_ward.n_id=nurse.n_id";
	$result2 = mysqli_query($con,$sql2);
    $OUTPUT2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);  
?>


<option value="">-- Select Nurse --</option>
<?php
	foreach($OUTPUT2 as $ns) {

?>
	<option value="<?php echo $ns['n_id']; ?>"><?php echo $ns['n_name'] ?></option>
<?php
	}
}
?>

<?php
if(!empty($_POST["patient"])) {
	$sql ="SELECT * FROM admitted,patient WHERE w_no = '" . $_POST["patient"] . "' && patient.no=admitted.p_id ";
	$result = mysqli_query($con,$sql);
    $OUTPUT = mysqli_fetch_all($result,MYSQLI_ASSOC); 
?>
	<option value="">-- Select Patient --</option>
<?php
	foreach($OUTPUT as $patients) {
?>
	<option value="<?php echo $patients['no']; ?>"><?php echo $patients['fname']." ".$patients['lnname']; ?></option>
<?php
	}
}
?>
