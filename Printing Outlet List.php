<!DOCTYPE html>

<html lang="en">
<head>
	<title>Printing Outlet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="myWebsiteStyle.css">

<?php
	session_start();

if(array_key_exists('gambang', $_POST)) {
	 
	$_SESSION['outlet_name'] = 'Gambang';
	session_write_close();
	header("location: make order.php");
	exit();
 }else if(array_key_exists('pekan', $_POST)) {
	 
	$_SESSION['outlet_name'] = 'Pekan';
	session_write_close();
	header("location: make order.php");
	exit();
 }
 
 $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());

	// to select the targeted database
	mysqli_select_db($link, "projectdb") or die(mysqli_error());
	
	$sql2 = "SELECT order_list.total_price, order_list.order_date, package_list.type  FROM ((order_list INNER JOIN printing_outlet_list ON order_list.printing_outlet_list = printing_outlet_list.id) INNER JOIN package_list ON order_list.package_list_id = package_list.id) where order_list.user_id = 1"; 

	$result2 = mysqli_query($link,$sql2);
	
	mysqli_close($link);
?>
</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: "Josefin Sans", sans-serif;
}

.wrapper .multi_color_border{
  width: 100%;
  height: 5px;
  background: linear-gradient(to right, #37a000 0% , #37a000 25%, #494949 25%, #494949 50%, #37a000 50%, #37a000 75%, #494949 75%, #494949 100%);
}

.wrapper .top_nav{
  margin-top: 5px;
  width: 100%;
  height: 65px;
  background: #fff;
  padding: 0 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.wrapper .top_nav .left{
  display: flex;
  align-items: center;
}

.wrapper .top_nav .left .logo p{
  font-size: 24px;
  font-weight: bold;
  color: #494949;
  font-family: "Mountains of Christmas", cursive;
  margin-right: 25px;
}

.wrapper .top_nav .left .logo p span{
  color: #37a000;
  font-family: "Mountains of Christmas", cursive;
}

.wrapper .top_nav .right ul{
  display: flex;
  width: 80%;
  background: #f9f9f9;
  height: 35px;
  padding: 0 50px;
}

.wrapper .top_nav .right ul li{
  margin: 0 12px;
}

.wrapper .top_nav .right ul li:last-child{
  background:  #37a000;
  margin-right: 0;
  border-radius: 2px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.wrapper .top_nav .right ul li:hover:last-child{
  background: #494949;
}

.wrapper .top_nav .right ul li a{
  display: block;
  padding: 8px 10px;
  color: #666666;
}

.wrapper .top_nav .right ul li:last-child a{
   color: #fff;
}

.wrapper .bottom_nav{
  width: 100%;
  background: #87ab69;
  height: 45px;
  padding: 0 50px;
}

.wrapper .bottom_nav ul{
  width: 100%;
  height: 45px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.wrapper .bottom_nav ul li a{
  color: white;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 12px;
}

.wrapper .bottom_nav a:hover{
	color: black;
	background-color: #ddd;
}
	
#div1{
	margin: 10px;
}


#div2 {

  display: flex;
  flex-wrap: wrap;
  font-size: 20px;
  text-align: center;
  
}

.column1 {
  background-color: #f1f1f1;
  padding: 30px;
  flex: 50%;
}

.column2 {
  background-color: dodgerblue;
  padding: 30px;
  flex: 50%;
}


.div3{
	border-radius: 4px;
	background-color: #87ab69;
	border: none;
	color: #FFFFFF;
	text-align: center;
	font-size: 28px;
	padding: 20px;
	width: 200px;
	transition: all 0.5s;
	cursor: pointer;
	margin: 5px;
}

.div3 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.div3 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.div3:hover span {
  padding-right: 25px;
}

.div3:hover span:after {
  opacity: 1;
  right: 0;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 20px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

footer{
  
  bottom: 0px;
  width: 100%;
  background: #87ab69;
}

.main-content{
  display: flex;
}
.main-content .box{
  flex-basis: 70%;
  padding: 10px 20px;
}

.box h2{
  font-size: 25px;
  font-weight: 600;
  text-transform: uppercase;
  color: white;
}
.box .content{
  margin: 20px 0 0 0;
  position: relative;
   color: white;
}

.center .content .text{
  font-size: 1.0625rem;
  font-weight: 500;
  padding-left: 10px;
}
.center .content .phone{
  margin: 15px 0;
}
.center .content .email{
  margin: 15px 0;
}
.right .content .social{
  margin: 20px 0 0 0;
}

.right .content .social-menu ul{
	position: relative;
	top: 50%;
	left: 50%;
	padding: 0;
	margin: 0;
	transform: translate(-50%, -50%);
	display: flex;
}

.right .content .social-menu ul .fa{
	font-size: 30px;
	line-height: 40px;
	transition: .6s;
	color: #000;
	
}

.right .content .social-menu ul a{
	position: relative;
	display: block;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background-color: #fff;
	text-align: center;
	transition: .6s;
	box-shadow: 0 5px 4px rgba(0,0,0,5);
}

.right .content .social-menu ul a:hover{
	transform: translate(0);
}

.right .content .social-menu ul .fa:hover{
	color: #fff;	
}

.right .content .social-menu ul:nth-child(1) a:hover{
	background-color: #3b5998;	
}

.right .content .social-menu ul:nth-child(2) a:hover{
	background-color: #00acee;
}

.right .content .social-menu ul:nth-child(3) a:hover{
	background-color: #8a3ab9;	
}

@media screen and (max-width: 900px) {
footer{
	position: relative;
	bottom: 0px;
	}
	.main-content{
		flex-wrap: wrap;
		flex-direction: column;
	}

	.main-content .box{
		margin: 5px 0;
	}
}

</style>
<body>
<div class="wrapper">
	<div class="multi_color_border"></div>
		<div class="top_nav">
			<div class="left">
				<div class="logo">
					<p><span>ON</span>PRINT</p>
				</div>
			</div> 
			<div class="right">
			<ul>
			  <li><a href="">Login</a></li>
			  <li><a href="#">SignUp</a></li>
			  <li><a href="#">FAQ</a></li>
			</ul>
		  </div>
		</div>
	<div class="bottom_nav">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Product</a></li>
			<li><a href="#">Order</a></li>
			<li><a href="#">Payment</a></li>
			<li><a href="#">About Us</a></li>
			<div class="dropdown">
				<button class="dropbtn">Other 
				  <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a onclick="document.getElementById('id01').style.display='block'">Order History</a></li>
					<a href="report.php">Report</a></li>
				</div>
			</div> 
		</ul>
	</div>
</div>
<div id='div1'>
<h1>Printing Outlet List</h1><br>
<p><b>Please choose any one of available outlet at below:</b></p>
</div><br>
<form method='post'>
	<div id='div2'>
		<div class='column1'>
		<h2>Gambang</h2>
		<iframe width='520' height='400' src='https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=ump%20Gambang+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'></iframe>
		<button type ='submit' name='gambang' class='div3'><span>SELECT</span></input>
		</div>
		<div class='column2'>
		<h2>Pekan</h2>
		<iframe width='520' height='400' src='https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=ump%20pekan+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'></iframe>
		<button type='submit' name='pekan' class='div3'><span>SELECT</span></button>
		</div>
	</div>
</form>
<div id="id01" class="modal">
<form class="modal-content animate" action="/action_page.php" method="post">
	<div class="imgcontainer">
	  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<h2>Order History</h2>
		</div>					
		<div class="container">
		  <?php
			$i = 1;
			if (mysqli_num_rows($result2) > 0) {
				//output data of each row
					while($row = mysqli_fetch_assoc($result2)) {
						
						echo "<div><h1>Order ".$i."</h1><br></div><b>Order Date</b><div class='text'>".$row["order_date"]."</div><b>Package Name</b><div class='text'>".$row["type"]."</div><b>Total Price</b><div class='text'>".$row["total_price"]."</div>";
					}
				} 
				else {
					echo "No Order History";
				}
				?>
			</div>
	</form>
</div>
<footer>
      <div class="main-content">
        <div class="left box">
		<br>
          <h2>Company</h2>
		  <br>
          <div class="content">
            <p>OnPrint</p>
			<p>09-12345678</p>
			<p>Universiti Malaysia Pahang</p>
			<p>26600 Pekan</p>
			<p>Pahang</p>
          </div>
        </div>
        <div class="center box">
		<br>
          <h2>Contact Details</h2>
		  <br>
          <div class="content">
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">Phone: 09-12345678</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">Email: onprint@gmail.com</span>
            </div>
          </div>
        </div>
        <div class="right box">
		<br>
          <h2>Social Media</h2>
		  <br>
		  <div class="content">

            <div class="social-menu">
			<br>
			<ul>
             <a href="#"><i class="fa fa-facebook"></i></a> 
			 <a href="#"><i class="fa fa-twitter"></i></a>
			 <a href="#"><i class="fa fa-instagram"></i></a>
			</ul>
            </div>
          </div>
        </div>
      </div>
 </footer>
</body>
</html>