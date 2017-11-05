<!DOCTYPE html>
<?php
//Step1
 $db = mysqli_connect('localhost','root','science2012','clean')
 or die('Error connecting to MySQL server.');
?>
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
$nameErr = $emailErr = $aadharErr = $addressErr = $cityErr = $pincodeErr = $districtErr = $stateErr = $countryErr = "";
$name = $email = $aadhar = $address = $city = $pincode = $district = $state = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

 //email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  //aadhar
  if (empty($_POST["aadhar"])) {
    $aadharErr = "Aadhar no. is required";
  } else {
    $aadhar = test_input($_POST["aadhar"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$aadhar)) {
      $aadharErr = "Only numerical values allowed";
    }
  }

//address
if (empty($_POST["address"])) {
  $addressErr = "Address is required";
} else {
  $address = test_input($_POST["address"]);
}

//city
if (empty($_POST["city"])) {
  $cityErr = "City is required";
} else {
  $city = test_input($_POST["city"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
    $cityErr = "Only letters and white space allowed";
  }
}

//pincode
if (empty($_POST["pincode"])) {
  $pincodeErr = "Pincode is required";
} else {
  $pincode = test_input($_POST["pincode"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[0-9]*$/",$pincode)) {
    $pincodeErr = "Only numerical values allowed";
  }
}

//district
if (empty($_POST["district"])) {
  $districtErr = "District is required";
} else {
  $district = test_input($_POST["district"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$district)) {
    $districtErr = "Only letters and white space allowed";
  }
}

//state
if (empty($_POST["state"])) {
  $stateErr = "State name is required";
} else {
  $state = test_input($_POST["state"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
    $stateErr = "Only letters and white space allowed";
  }
}

//country which is fixed as INDIA
if (empty($_POST["country"])) {
  $CountryErr = "Country is required";
} else {
  $country = "INDIA";
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
    $countryErr = "Only letters and white space allowed";
  }
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
   <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <!--name-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Name:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="name" value="<?=$name;?>">
          <span class="error"> <?php echo $nameErr;?></span>
        </div>
      </div>
      <br>
        <!--email-->
      <div claas="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail:</label>
        <div claas="col-sm-2">
          <input type="text" class="form-control" id="name" name="email" value="<?=$email;?>">
          <span class="error"> <?php echo $emailErr;?></span>
        </div>
      </div>
      <br>
      <!--aadhar no.-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Aadhar:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="aadhar" value="<?=$aadhar;?>">
          <span class="error"> <?php echo $aadharErr;?></span>
        </div>
      </div>
      <br>
        <!--address-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Address:</label>
        <div claas="col-sm-2">
          <input type="text-area" cols="4" class="form-control" id="name" name="address" value="<?=$address;?>">
          <span class="error"> <?php echo $addressErr;?></span>
        </div>
      </div>
      <br>
     <!--city-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">City:</label>
        <div clas="col-sm-2">
          <input type="text"class="form-control" id="name" name="city" value="<?=$city;?>">
          <span class="error"> <?php echo $cityErr;?></span>
        </div>
      </div>
      <br>
        <!--pincode-->
      <div claas="form-group">
        <label for="name" class="col-sm-2 control-label">Pincode:</label>
        <div claas="col-sm-2">
          <input type="text" class="form-control" id="name" name="pincode" value="<?=$pincode;?>">
          <span class="error"> <?php echo $pincodeErr;?></span>
        </div>
      </div>
      <br>

      <!--district-->
       <div claas="form-group">
         <label for="name" class="col-sm-2 control-label">District:</label>
         <div clas="col-sm-2">
           <input type="text"class="form-control" id="name" name="district" value="<?=$district;?>">
           <span class="error"> <?php echo $districtErr;?></span>
         </div>
       </div>
       <br>
         <!--state-->
       <div claas="form-group">
         <label for="name" class="col-sm-2 control-label">State:</label>
         <div claas="col-sm-2">
           <input type="text" class="form-control" id="name" name="state" value="<?=$state;?>">
           <span class="error"> <?php echo $stateErr;?></span>
         </div>
       </div>
       <br>
       <!--country-->
     <div claas="form-group">
       <label for="name" class="col-sm-2 control-label">Country:</label>
       <div claas="col-sm-2">
         <input type="text" class="form-control" id="name" placeholder="INDIA" name="country" value="<?=$country;?>">
         <span class="error"> <?php echo $countryErr;?></span>
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
   <?php
   $query = "SELECT * FROM Data" ;
 mysqli_query($db, $query) or die('Error querying database.');
   echo $query;

   ?>

</div>

</body>
</html>
