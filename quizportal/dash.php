<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Admin - Quiz Portal</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>



<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>


</head>

<body  style="background:#eee;">
<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Quiz Portal</span></div>
<?php
include_once 'dbConnection.php';
session_start();
if (!(isset($_SESSION['username']))  || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
    session_destroy();
    header("location:index.php");
} else {
    $name     = $_SESSION['name'];
    $username = $_SESSION['username'];
    
    include_once 'dbConnection.php';
    echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $name . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}
?>

</div></div>
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li <?php
          if (@$_GET['q'] == 0)
            echo 'class="active"';
          ?>><?php if($username=='admin') echo "<a href='dash.php?q=0'>Home</a>"; ?></li>
      </li>
        <li <?php
            if (@$_GET['q'] == 1)
                echo 'class="active"';
            ?>><a href="dash.php?q=1">Students' List</a></li> 


      <li <?php
            if (@$_GET['q'] == 8)
                echo 'class="active"';
            ?>>
            <?php if($username=='admin') echo "<a href='dash.php?q=8'>Teachers' List</a>"; ?></li>
  
        <li <?php
          if (@$_GET['q'] == 4)
              echo 'class="active"';
          ?>><?php if($username=='admin') echo'<a href="dash.php?q=4">Add Quiz</a>'; ?></li>

        <li <?php
          if (@$_GET['q'] == 5)
              echo 'class="active"';
          ?>><?php if($username=='admin') echo'<a href="dash.php?q=5">Remove Quiz</a>'; ?></li>

         <li <?php
            if (@$_GET['q'] == 6)
                echo 'class="active"';
            ?>>
            <a href="dash.php?q=6">Add Student</a></li>
           

        <li <?php
            if (@$_GET['q'] == 9)
                echo 'class="active"';
            ?>>
            <?php if($username=='admin') echo'<a href="dash.php?q=9">Add Teacher</a>'; ?></li>


        

          
      </ul>

        <?php if($username!='admin') echo '<b><a href="view_results.php" class="btn pull-right" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Results</b></span></a>'; ?>
          </div>
  </div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php
if (@$_GET['q'] == 0 && $username=='admin') {
    
    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle">
<tr>
<td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Name</b></td>
<td style="vertical-align:middle"><b>Course Code</b></td>
<td style="vertical-align:middle"><b>Total question</b></td>
<td style="vertical-align:middle"><b>Marks</b></td>
<td style="vertical-align:middle"><b>Time limit</b>
</td><td style="vertical-align:middle"><b>Status</b>
</td><td style="vertical-align:middle"><b>Action</b></td>
</tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $code    = $row['code'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $code . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#ff0000;font-size:12px;padding:5px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $code . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:5px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}

   
if (@$_GET['q'] == 1) {
    
    $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Name</b></td>
<td style="vertical-align:middle"><b>Email</b></td>
<td style="vertical-align:middle"><b>Gender</b></td>
<td style="vertical-align:middle"><b>Branch</b></td>
<td style="vertical-align:middle"><b>Username</b></td>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $name      = $row['name'];
        $gender    = $row['gender'];
        $branch    = $row['branch'];
        $username1 = $row['username'];
        $email     = $row['email'];
        
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td>
        <td style="vertical-align:middle">' . $name . '</td>
        <td style="vertical-align:middle">' . $email . '</td>
        <td style="vertical-align:middle">' . $gender . '</td>
        <td style="vertical-align:middle">' . $branch . '</td>
        <td style="vertical-align:middle">' . $username1 . '</td>
        <td style="vertical-align:middle"><a title="Delete User" href="update.php?dusername=' . $username1 . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
        </tr>';
    }

    $c = 0;
    echo '</table></div>';
    
}

if(@$_GET['q']==8)
{
  include('teachers_list.php');
}

if(@$_GET['q']==9)
{
  include('dbConnection.php');
    
    //check if form is submitted
    if(isset($_POST['submit']))
    {

      $password=md5($_POST[password]);
      $sql="insert into teachers(teacher_name,gender,subject,email,password,course_code) values ('$_POST[t_name]','$_POST[gender]','$_POST[subject]','$_POST[email]','$password','$_POST[coursecode]')";
      $res=mysqli_query($con,$sql);
      if($res)
      {
      

        $flag=1;  
        
        //add the username and pw to login_credentials table
        $sql2="insert into login_credentials(username,password) values ('$_POST[email]','$password')";
        
        mysqli_query($con,$sql2);
      
      }
      else
      {
        echo"Error: could not add teacher to the database." . mysqli_error($con);
      }
      }


  echo '<div class="panel panel-default">
  
  <?php if($flag) { ?>
  <div class="alert alert-success">
    <strong>Data insertion successful!</strong> 
  </div>
  <?php } ?>

  <div class="panel-body">
    <form action="dash.php?q=9" method="post">
      <div class="form-group">
        <label for="t_name">Teacher Name</label>
        <input type="text" name="t_name" id="t_name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" name="gender" id="gender" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="coursecode">Course Code</label>
        <input type="text" name="coursecode" id="coursecode" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="passwprd">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="submit" class="btn btn-primary" required>
      </div>
    </form>
  </div>
 </div>';
}


if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
    echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Course title" class="form-control input-md" type="text">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="code"></label>  
  <div class="col-md-12">
  <input id="code" name="code" placeholder="Enter Course Code" class="form-control input-md" type="text">
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
    
    
    
}
if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
    echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';
    
    for ($i = 1; $i <= @$_GET['n']; $i++) {
        echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
    }
    
    echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
    
    
    
}
if (@$_GET['q'] == 5) {
    
    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Topic</b></td>
<td style="vertical-align:middle"><b>Code</b></td>
<td style="vertical-align:middle"><b>Total question</b></td>
<td style="vertical-align:middle"><b>Marks</b></td>
<td style="vertical-align:middle"><b>Time limit</b></td>
<td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $code   = $row['code'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $code . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="btn" style="margin:0px;background:red;color:white">&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
    }
    $c = 0;
    echo '</table></div>';
    
}

if (@$_GET['q'] == 6)
{

    include('dbConnection.php');
    //include('add_student.php');
    if(isset($_POST['submit']))
    {
      $pw=md5($_POST[pw]);
      $sql="insert into user(name,email,branch,gender,username,password) values ('$_POST[name]','$_POST[email]','$_POST[branch]','$_POST[gender]','$_POST[usn]','$pw')";
      $res=mysqli_query($con,$sql);
      if($res)
      {
        $flag=1;  
      }
      else
      {
        echo"Error: could not add student to the database." . mysqli_error($con);
      }
      }

      echo '<div class="panel panel-default">
  
      <?php if($flag) { ?>
      <div class="alert alert-success">
        <strong>Data insertion successful!</strong> 
      </div>
      <?php } ?>
      
      <div class="panel-heading">
        <h2>
        <a href="dash.php?q=6" class="btn btn-success">Add Student</a>
        </h2> 

      </div>

      <div class="panel-body">
        <form action="dash.php?q=6" method="post">
          <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">Student Email id</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" name="branch" id="branch" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="usn">USN</label>
            <input type="text" name="usn" id="usn" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="branch">Password</label>
            <input type="password" name="pw" id="pw" class="form-control" required>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="submit" class="btn btn-primary" required>
          </div>
        </form>
      </div>
     </div>';



} 



?>
</div>
</div></div>
</body>
</html>
