<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Quiz Portal </title>
   
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/> 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>

<body >
    <!-- header start -->
    <div class="header">
        <div class="row">
        <div class="col-lg-6">
        <span class="logo">Quiz Portal </span></div>
        <div class="col-md-28 col-md-offset-4">
        <!-- modalform -->
        <a href="#" class="btn btn-primary logb pull-right"  data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1" align:right><b> Student Login </b> </span></a>


        <a href="#" class="btn btn-primary logb pull-right"  data-toggle="modal" data-target="#login"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1" align:right><b> Admin/Teacher Login </b> </span></a></div>
        
       


        <!-- modal code -->
        <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content title1">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to your Account</span></h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
        <fieldset>
        <div class="form-group">
        <label class="col-md-3 control-label" for="username"></label>  
        <div class="col-md-6">
        <input id="username" name="username" placeholder="USN" class="form-control input-md" type="username">

        </div>
        </div>
        <div class="form-group">
        <label class="col-md-3 control-label" for="password"></label>
        <div class="col-md-6">
        <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">

        </div>
        </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
        </fieldset>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
<!-- header end -->

<!-- mid form start -->

<div class="panel panel-heading" style="background:#ffffff">
      <h2 align="center"><strong>ONLINE QUIZ PORTAL</strong></h2>

      <div class="panel panel-body" >
        <p><b>Team members:</b></p>
        <table class="table table-striped" align="center">
          <tr>
          <th>Name</th>
          <th>USN</th>
          </tr>

          <tr>
            <td>UTKARSH SINGH</td><td>1RV17IS054</td>
          </tr>
          <tr>
            <td>SUDARSHAN</td><td>1RV17IS049</td>
          </tr>
        </table>
      </div>
</div>

<!-- mid form end -->


<!-- footer -->

<?php 
    include('footer.php');
 ?>
<!-- footer end -->



<!-- admin login functionality -->

<div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to Admin</span></h4>
      </div>
      <div class="modal-body title1">
        <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <form role="form" method="post" action="admin.php?q=index.php">
            <div class="form-group">
                  <input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
                  </div>
                  <div class="form-group" align="center">
                    <input type="submit" name="login" value="Login" class="btn btn-primary" />
                  </div>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
      </div>
    </div>
  </div>
</div>


</body>

</html>


