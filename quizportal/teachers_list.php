
<!-- This file is used by admin to view the list of all teachers in ISE Dept.-->
<?php 

	include("dbConnection.php");
	
 ?>


 <div class="panel panel-default">

 	<div class="panel panel-heading">
 		<h2 style="text-align:center">ISE Teachers List</h2>

 		<h2>
 		<a href="dash.php?q=9" class="btn btn-success">Add Teacher</a>
 		</h2>	

 		<div class="panel panel-body">
 				<table class="table table-striped">
 					<tr>
 					<th>ID</th>
 					<th>Name</th>
 					<th>Subject</th>
 					<th>Email</th>
 					</tr>
 					
 					<?php 
						$sql="select * from teachers";
						$result=mysqli_query($con,$sql) or die('error!');
						if($result)
							echo "";
						else
							echo"Error: could not display the results!" . mysqli_error($con);
 						$sn=0;
 						$count=0;
 						while($row=mysqli_fetch_array($result))
 						{

 							$sn++;

 					 ?>

 					 <tr>
 					 	<td> <?php echo $sn; ?> </td>
 					 	
 					 	<td> <?php echo $row['teacher_name'] ?> </td>
 					 	<td> <?php echo $row['subject'] ?> </td>
 					 	<td> <?php echo $row['email'] ?> </td>
 					 	
 					 </tr
 					
 					<?php 
 					 		$count++;
 					 	}
 					 
	 				?>

				</table>					
 		</div>
 	</div>
 </div>

