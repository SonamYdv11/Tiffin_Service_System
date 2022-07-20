<!DOCTYPE html>
<?php
SESSION_start();
$con=mysqli_connect("localhost","root","","contact_us");

if(isset($_GET['update'])) {

  $tname=$_GET['tname']; 
          $sql = mysqli_query( $con ,"SELECT * FROM add_tiffin WHERE tname='$tname'");
          $row = mysqli_fetch_row($sql);    
        $id= $row[0];
 

 
  $tcategory=$_GET['tcategory'];

  // $des=mysqli_real_escape_string($con,$_GET['des']);
  // $publisher=mysqli_real_escape_string($con,$_GET['publisher']);
  $quantity=$_GET['tqty'];
  $time=$_GET['otime'];
  $price=$_GET['tprice'];
  
      $query="UPDATE `add_tiffin` SET `tname`='$tname',`tcategory`='$tcategory',`tqty`='$quantity',`otime`='$time',`tprice`='$price'  WHERE `add_tiffin`.`id`='$id' ";
      $updatequery=mysqli_query($con,$query ) or die(mysqli_error($con));                
    if($updatequery)
    {
        echo "<script>alert('Details Updated');</script>";
    }  
    else 
    {
        echo"<script>alert('failed');</script>";
    }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASBS Online Tiffin Services System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/hover.css" />
  <link href="css/hover-min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="icons-1.4.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style1.css">



  <script src="custome.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function Search()
    {
   
              
        var tiffin=document.forms["form1"]["tname"].value;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("d1").innerHTML=this.responseText;
			
            }
        };
        
        xmlhttp.open("POST","UpdateAjax.php?tname="+tiffin,true);
        xmlhttp.send();
    }
</script>
</head>

<body>

  <section>
    <div class="container-fluid bg">
      <div class="hr">
        <div class="row">
          <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <i class="bi bi-telephone s">+91 7219 - 446 - 042</i>
            <a href="#"><i class="bi bi-envelope s1">info.asbs@gmail.com</i></a>
          </div>
          <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12 s2">
            <a class="btn btn-outline-danger" href="selectplan.php" role="button"><i class="bi bi-credit-card-2-front">Select
                Plan</i></a>
            <a class="btn btn-outline-danger" href="todaysmenu.php" role="button"><i class="bi bi-calendar3">Today's
                Menu</i></a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">ASBS Tiffin Servics</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    Welcome Admin ..
                <?php 
          
                echo $_SESSION['cname'];
                ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li><br><br>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout </a>
        </li>

      </ul>
    </div>
  </nav>

  <section>
      <div class="upage">
          
      </div>
  </section>


<div class="container-fluid">
    <div class="heding-form">
    <h3> Update Tiffin Details</h3>
    <form name="form1" method="GET" enctype="multipart/form-data">
      <div class="input-text">
        <br>
        <br>
        <center>
                <label> --- Select Tiffin you want to Update --- </label>
        </center>
            
          <div >
            <br>
            <select name="tname"  id="drop" >
            <option></option>
                    <?php
                    // $user=$_SESSION['cname'];
                    $sql = mysqli_query($con, "SELECT tname From add_tiffin ");
                    $row = mysqli_num_rows($sql);
                    while ($row = mysqli_fetch_array($sql)){
                    echo "<option value='". $row['tname'] ."'>" .$row['tname'] ."</option>" ;
                    }
                    ?>
              </select><br>
              <button name="search" type="button" onclick="Search()"> Search Tiffin</button> 
              <div id="d1"></div>
          </div ><br><br>
        
        <!-- <button type="submit" name="update">Update Tiffin</button>  -->
        
      </div>
    </form>
  </div>
 </div>
 
 <br>
 
 <div class="footer" align="center">
    <caption>All Copyright By ASBS @ 2021</caption>
  </div>
  </div>
</section>

</body>

</html>