<!DOCTYPE html>
<html>
<head>
   <title>Clean My City</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }


  </style>
</head>
<body>
<!--php form variables-->
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Clean My City</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav  navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Complaint </a></li>
        <li><a href="#">Contact</a></li>
      </ul>

    </div>
  </div>
 </nav>
<hr>
<div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
<div class="container">
  <div class="carousel-inner">

     <div class="item active">
       <img src="https://4.bp.blogspot.com/-WgHsZGl2hjA/Vs_lkrJtX-I/AAAAAAAABF8/lw9r3BXNBnI/s1600/banega-swachh-india.jpg" alt="Los Angeles" style="width:100%;">
       <div class="carousel-caption">
         <h3>Los Angeles</h3>
         <p>LA is always so much fun!</p>
       </div>
     </div>

     <div class="item">
       <img src="http://www.india.com/wp-content/uploads/2017/01/Swachh-Bharat-Abhiyan-gandhi.jpg" alt="Chicago" style="width:100%;">
       <div class="carousel-caption">
         <h3>Chicago</h3>
         <p>Thank you, Chicago!</p>
       </div>
     </div>

     <div class="item">
       <img src="https://4.bp.blogspot.com/-D3T-g90YLxQ/VDONYmPbnWI/AAAAAAAAFG8/tgyS7jcvzHY/s1600/Final-Swachh-bharat-MIB-Google%2B-Coverpage.jpg" alt="New York" style="width:100%;">
       <div class="carousel-caption">
         <h3>New York</h3>
         <p>We love the Big Apple!</p>
       </div>
     </div>

   </div>

   <!-- Left and right controls -->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>
</div>
</div>
<hr>
<div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
  <span style="font-size: 30px; background-color: rgb(255,255,255); padding: 0 10px;">
    Complaint Here
  </span>
</div>
<br>
<hr>



<!--update this this informaton in bootstarp-->
<div class="container">
   <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <!--name-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Name:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="name" value="<?=$name;?>">
        </div>
      </div>
      <br>
        <!--email-->
      <div claas="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail:</label>
        <div claas="col-sm-2">
          <input type="text" class="form-control" id="name" name="email" value="<?=$email;?>">
        </div>
      </div>
      <br>
      <!--aadhar no.-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Aadhar:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="aadhar" value="<?=$aadhar;?>">
        </div>
      </div>
      <br>
        <!--address-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Address:</label>
        <div claas="col-sm-2">
          <input type="text" class="form-control" id="name" name="address" value="<?=$address;?>">
        </div>
      </div>
      <br>
     <!--city-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">City:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="city" value="<?=$city;?>">
        </div>
      </div>
      <br>
        <!--pincode-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Pincode:</label>
        <div claas="col-sm-2">
          <input type="text" class="form-control" id="name" name="pincode" value="<?=$pincode;?>">
        </div>
      </div>
      <br>

      <!--district-->
       <div claas="form-group">
         <label for="name" class="col-sm-2 control-label">District:</label>
         <div clas="col-sm-2">
           <input type="text"class="form-control" id="name" name="district" value="<?=$district;?>">
         </div>
       </div>
       <br>
         <!--state-->
       <div claas="form-group">
         <label for="name" class="col-sm-2 control-label">State:</label>
         <div claas="col-sm-2">
           <input type="text" class="form-control" id="name" name="state" value="<?=$state;?>">
         </div>
       </div>
       <br>
       <!--country-->
     <div claas="form-group">
       <label for="name" class="col-sm-2 control-label">Country:</label>
       <div claas="col-sm-2">
         <input type="text" class="form-control" id="name" name="country" value="<?=$country;?>">
       </div>
     </div>
     <br>
        <!--submit-->

      	<div class="form-group">
		     <div class="col-sm-2 col-sm-offset-2">
			   <input id="submit" name="submit" type="submit" value="submit" class="btn btn-success btn-lg">
		     </div>
	    </div>

      </div>
   </form>
</div>

</body>
</html>
