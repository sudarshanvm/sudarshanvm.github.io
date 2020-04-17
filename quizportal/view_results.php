<head>
	<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Results - Quiz Portal</title>
	<link  rel="stylesheet" href="css/bootstrap.min.css"/>
	 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
	 <link rel="stylesheet" href="css/main.css">
	 <link  rel="stylesheet" href="css/font.css">
	 <script src="js/jquery.js" type="text/javascript"></script>

	  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
	  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>


 <?php 
	include('dbConnection.php');
	//echo 'hello';
 ?>
<body>

<div class="panel panel-default">

 	<div class="panel panel-heading">
 		<h2 style="text-align:center">Results</h2>

 		<h2>
 		<a href="dash.php" class="btn btn-success">Home</a>
 		</h2>

 		</div>
 				<table class="table table-striped">
 					<tr>
 					<th>ID</th>
 					<th>USN</th>
 					<th>Exam ID</th>
 					<th>Score</th>
 					<th>Correct</th>
 					<th>Wrong</th>

 					</tr>
 					
 					<?php 
						$sql="select * from history where status='finished'"; //where score_updated=true;
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
 					 	
 					 	<td> <?php echo $row['username'] ?> </td>
 					 	<td> <?php echo $row['eid'] ?> </td>
 					 	<td> <?php echo $row['score'] ?> </td>
 					 	<td> <?php echo $row['correct'] ?> </td>
 					 	<td> <?php echo $row['wrong'] ?> </td>
 					 </tr
 					
 					<?php 
 					 		$count++;
 					 	}
 					 
	 				?>
		
			</table>
	</div>

</body>