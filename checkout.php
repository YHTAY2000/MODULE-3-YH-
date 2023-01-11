<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="myWebsiteStyle.css">
<?php
$i = 1;
// to make a connection with database
$link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());

// to select the targeted database
mysqli_select_db($link, "projectdb") or die(mysqli_error());

$sql1 = "SELECT order_list.quality, order_list.total_price, printing_outlet_list.name, order_list.quantity, package_list.type, document.document_name FROM (((order_list INNER JOIN printing_outlet_list ON order_list.printing_outlet_list = printing_outlet_list.id) INNER JOIN package_list ON order_list.package_list_id = package_list.id) INNER JOIN document ON order_list.document_id = document.id) where order_list.user_id = 1"; 

$result1 = mysqli_query($link, $sql1);//Close the database connection

$sql2 = "SELECT order_list.total_price, order_list.order_date, package_list.type  FROM ((order_list INNER JOIN printing_outlet_list ON order_list.printing_outlet_list = printing_outlet_list.id) INNER JOIN package_list ON order_list.package_list_id = package_list.id) where order_list.user_id = 1"; 

$result2 = mysqli_query($link,$sql2);
	
mysqli_close($link);
?>
<style>
*, *:before, *:after {
  box-sizing: inherit;
}

* {
  margin: 0px;
  padding: 0px;
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

.div1{
	padding:10px;
	
}

.div1 p{
	font-size: 20px;
}

h2{
	font-size: 20px;
	margin: 0;
}

h3{
	text-align: center;
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

.text {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
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

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
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
  flex-basis: 50%;
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
</head>
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
<div class='div1'>
	<h1>Checkout Menu</h1><br>
	<hr><br>
	<p>Please check your order</p>
</div>
<div class="row">
  <div class="col-75">
	<div class="container">
	  <form action="/action_page.php">

		<?php if (mysqli_num_rows($result1) > 0) {
		//output data of each row
			while($row = mysqli_fetch_assoc($result1)) {
			echo"
			<div class='row'>
				<div class='col-50'>
				<h3>Order Details $i</h3>
			
				<label><i class='fa fa-user'></i>Package Name</label>
					<div class='text'>".
						$row["type"]."
						</div>
						<label><i class='fa fa-envelope'></i>Printing Outlet</label>
							<div class='text'>".$row["name"]."</div>
							<label><i class='fa fa-address-card-o'></i>Document Name</label>
							<div class='text'>".$row["document_name"]."</div>
							<label><i class='fa fa-institution'></i>Quantity</label>
							<div class='text'>".$row["quantity"]." /PCS
						</div>
						<label><i class='fa fa-institution'></i>Total Price</label>
						<div class='text'>RM ".$row['total_price']."</div>
					</div>
				</div><hr>";$i++;
			
			
			}
		}
		else{
			echo "No Order<br><br><br><br><br><br><br><br>";
		}
		?>
		<input type="submit" value="Continue to checkout" class="btn">
	  </form>
	</div>
  </div>
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
						
						echo "<div><h1>Order ".$i."</h1><br></div><b>Order Date</b><div class='text'>".$row["order_date"]."</div><b>Package Name</b><div class='text'>".$row["type"]."</div><b>Total Price</b><div class='text'>RM ".$row["total_price"]."</div>";
					}
				} 
				else {
					echo "No Order History";
				}
				?>
			</div>
	</form>
</div>
</body>
</html>