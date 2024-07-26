<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$pick=$_POST['pick'];	
$dropp=$_POST['dropp'];
$cars=$_POST['cars'];

$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Pick,dropp,cars) VALUES(:fname,:email,:mobile,:pick,:dropp,:cars)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':pick',$pick,PDO::PARAM_STR);
$query->bindParam(':dropp',$dropp,PDO::PARAM_STR);
$query->bindParam(':cars',$cars,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title> ATS |  Ambai Tourism </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
	.hero{
    padding:2rem;
    box-shadow:0 0.75rem 2rem 0 rgba(0,0,0,1.5);
    color:#000;
}
.pay{
    position: absolute;
    top: 500px;
    left:900px;
}
.pay img{
    height:450px;
    width:285px;
}
.errorWrap {
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #dd3d36;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
padding: 10px;
margin: 0 0 20px 0;
background: #fff;
border-left: 4px solid #5cb85c;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">ATS- Ambai Tourism </h1>
	</div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container">
		<div class="hero">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Booking Foms</h3>
		<form name="enquiry" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>Full name</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="Full Name" required="">
	</p> 
<p style="width: 350px;">
<b>Email</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Valid Email id" required="">
	</p> 

	<p style="width: 350px;">
<b>Mobile No</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="10 Digit mobile No" required="">
	</p> 
	<p style="width: 350px;">
<b>Pick-up</b>  <input type="text" name="pick" class="form-control" id="pick"  placeholder="location" required="">
	</p> 
	<p style="width: 350px;">

	<p style="width: 350px;">
<b></b>Drop<input type="text" name="dropp" class="form-control" id="drop"  placeholder="location" required="">
	</p> 

	<p style="width: 350px;">
	<label class="inputLabel">Select car</label>
				<select name="cars" class="form-control"  >
					<option>Toyota Crysta - Rs. 20/km</option>
					<option>Toyota Innova - Rs. 18/km</option>
					<option>Suzuki Eartiga - Rs. 16/km</option>
					<option>Tavera - Rs. 18/km</option>
					<option>Toyota Etios - Rs. 12/km</option>
					<option>Suzuki Swift - Rs. 10/km</option>
				</select>
</p>
			<p style="width: 350px;">
<button type="submit" name="submit1" class="btn-primary btn">Submit</button>
			</p>
			</form>
			<div class="pay">
			<H1>Scan and Pay</h1>
				<img src="images/QR_code.png" alt="QR">
</div>
<marquee direction="right"><img src="images/download.jpg"></marquee>

</div>
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>