<!-- new footer (sticky) -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<!-- footer -->
<div class="row footer">

        <!-- <div class="col-md-2 box">
        	<a href="#" data-toggle="modal" data-target="#login" style="color:lightyellow">Admin Login</a>
        </div> -->

        <!-- <div class="col-md-6 box"> -->
         <br><a s style="color:white;" href="#" data-toggle="modal" data-target="#about">About Project</a>
        	<h5 align="center" style="color:white; text-align:center;">Organized by Department Of Information Science and Engineering</h5> 
          <a href="https://rvce.edu.in/" style='color:white;'>R.V. College Of Engineering, Bengaluru</a> <br><br></span>

         
        

</div>
<!-- footer end -->



       <!-- 
        for "about project" section -->

        

        <div class="modal fade" id="about">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <h3 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">About The Project</span></h3>
                 <?php
            $file = fopen("about.txt", "r");
            while (!feof($file)) {
            $string = fgets($file);
            $num    = strlen($string) - 1;
            $c      = str_split($string);
            for ($i = 0; $i < $num; $i++) {
                $last = $c[$i - 1];
                if ($c[$i] == ' ' && $last == ' ') {
                    echo '&nbsp;';
                } else {
                    echo $c[$i];
                }
            }
            echo "<br />";
        }

        fclose($file);
        ?>
              </div>
            </div>
          </div>
         </div>
      
</div>



</body>
</html> 
