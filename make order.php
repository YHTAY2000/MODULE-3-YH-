<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="myWebsiteStyle.css">

<?php 
	session_start();

if(array_key_exists('poster', $_POST)) {
	

	$_SESSION['packageName'] = 'Poster';
	$_SESSION['price'] = 3;
	session_write_close();
	header("location: upload.php");

}else if(array_key_exists('menu', $_POST)) {
	
	$_SESSION['packageName'] = 'Menu';
			$_SESSION['price'] = 5;

		session_write_close();

	header("location: upload.php");

}else if(array_key_exists('menu2', $_POST)) {
	
	$_SESSION['packageName'] = 'Folded Menu';
			$_SESSION['price'] = 5;

		session_write_close();

	header("location: upload.php");
	
}else if(array_key_exists('voucher', $_POST)) {
	
	$_SESSION['packageName'] = 'Voucher';
			$_SESSION['price'] = 3;

		session_write_close();

	header("location: upload.php");

}else if(array_key_exists('certificate', $_POST)) {
	
	$_SESSION['packageName'] = 'Certificate';
			$_SESSION['price'] = 3;

	session_write_close();
	header("location: upload.php");

}else if(array_key_exists('pocket', $_POST)) {
	
	$_SESSION['packageName'] = 'Money Pocket';
			$_SESSION['price'] = 6;

	session_write_close();
	header("location: upload.php");


}else if(array_key_exists('invitation', $_POST)) {
	
	$_SESSION['packageName'] = 'Invitations Card';
			$_SESSION['price'] = 3;

		session_write_close();
	header("location: upload.php");


}else if(array_key_exists('celebration', $_POST)) {
	
	$_SESSION['packageName'] = 'Celebration Card';
			$_SESSION['price'] = 2;

	session_write_close();
	header("location: upload.php");
	
}else if(array_key_exists('ticket', $_POST)) {
	
	$_SESSION['packageName'] = 'Event Ticket';
			$_SESSION['price'] = 3;

	session_write_close();
	header("location: upload.php");
}

	$outletname = $_SESSION['outlet_name'];
	
	$link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());

	// to select the targeted database
	mysqli_select_db($link, "projectdb") or die(mysqli_error());
	
	//add value 
	$query = "SELECT * FROM printing_outlet_list WHERE name = '$outletname'"
	or die(mysqli_connect_error());
	$sql2 = "SELECT order_list.total_price, order_list.order_date, package_list.type  FROM ((order_list INNER JOIN printing_outlet_list ON order_list.printing_outlet_list = printing_outlet_list.id) INNER JOIN package_list ON order_list.package_list_id = package_list.id) where order_list.user_id = 1"; 


	// to run sql query in database
	$result = mysqli_query($link, $query);
	$result2 = mysqli_query($link,$sql2);

	if (isset($result)){
		if (mysqli_num_rows($result) == 1){
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['outlet_id'] = $member['id'];
			session_write_close();
		}
	}
	else{
		die("Query faild");
	}
?>
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

.wrapper .bottom_nav li:hover{
	padding: 10px;
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

.div3{
	border-radius: 4px;
	background-color: Gray;
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

.desc{
		font-size: 20px;
}

#div1{
	margin: 10px;
}

.row {

  display: flex;
  flex-wrap: wrap;
  font-size: 20px;
  text-align: center;
}

.text{
	font-size: 15px;
	margin: 5px;
	text-align: justify;
}

.column {
	float: left;
	width: 33.3%;
	padding: 0 50px;
	display: none;
}

.border{
	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container2 {
  padding: 0 16px;
}

.container2::after, .row::after {
  content: "";
  clear: both;
  display: none;
}

@media screen and (max-width: 750px) {
  .column {
    width: 100%;
    display: none;
  }
}

#myBtnContainer{
	margin : 5px;
	float: right;
}

.container {
  display: inline-block;
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  background-color: #333;
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  transform: translate(0, 11px) rotate(-45deg);
}

.change .bar2 {
	opacity: 0;
}

.change .bar3 {
  transform: translate(0, -11px) rotate(45deg);
}

.dropdown2 {
	margin: 5px;
	position: relative;
	display: inline-block;
}

.dropdown-content2 {
	margin-left: 10px;
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	overflow: auto;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}


.dropdown2:hover {
	background-color: #ddd;
}

.show {
	display: block;
}

.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  color : black;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

.show {
  display: block;
}


#div3{
	border-radius: 5px;
	background-color: Gray;
	border: none;
	color: #FFFFFF;
	text-align: center;
	font-size: 28px;
	padding: 10px;
	width: 100%;
	transition: all 0.5s;
	cursor: pointer;
}

#div3 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

#div3 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

#div3:hover span {
  padding-right: 25px;
}

#div3:hover span:after {
  opacity: 1;
  right: 0;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: gray;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
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

.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.text2 {
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
	<div id="div1">
	<h1>Order</h1><hr>
	<p class="desc"><b>Welcome to order page, please select package you want to use</b></p>
	</div>
	<!--dropdown list-->
	<div class="dropdown2">
		<!--menu icon-->
		<div class="container" onclick="myFunction2(this);myFunction()">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div id="myDropdown" class="dropdown-content2">
			 <button class="btn active" onclick="filterSelection('all')"> Show all</button>
			  <button class="btn" onclick="filterSelection('menu')"> Menu</button>
			  <button class="btn" onclick="filterSelection('poster')"> Poster</button>
			  <button class="btn" onclick="filterSelection('card')"> Card</button>
			  <button class="btn" onclick="filterSelection('certificate')"> Certificate</button>
			  <button class="btn" onclick="filterSelection('voucher')"> Voucher</button>
		</div>
	</div><br>
	<form method="post">
	<div class="row">
		<div class="column poster">
			<div class="border">
				<div class="container">
					<h2>Poster</h2>
				</div><hr>
			<img src="Image/Poster.jpg"  alt="poster" style="width:100%;height:300px"><br><br><hr>
			<div class="text">
				<h2>Information</h2>
				<p>Posters are a truly versatile and low-cost marketing instrument 
				to display your message. They can be used to advertise products and 
				events, inform customers about current promotions, 
				or as a guide system to brick-and-mortar business. 
				A well-designed and well-thought-out poster is a great way to catch
				people’s attention. Printing posters and displaying them 
				in the right places is certain to give your business a boost.</p><br><br>
				<h2>Format</h2>
				<p>DIN A2 - (420x594mm) is twice the size of DIN A3, and half the size of DIN A1.</p><br>
				<h2>Paper Type </h2>
				<p>128g Art Paper - This type of paper has light thickness</p><hr>
				<h2 style="text-align:center">RM 3.00/pcs </h2>
			</div>
			<button type="submit" name="poster" id="div3"><span>SELECT</span></button>
			</div>
			<br><br><br>
		</div>
		<div class="column certificate">
			<div class="border">
				<div class="container">
				<h2>Certificate</h2>
				</div><hr>
				<img src="Image/certificate.png" alt="certificate" style="width:100%;height:325px"><hr>
				<div class="text">
				<h2>Information</h2>
				<p>Certificates are a gesture of congratulations, 
				appreciation or commemoration. They can be used to celebrate 
				any achievement or milestone in someone's life. At Gogoprint, 
				we specialize in the creation of high-quality certificates that will make 
				your recipient feel special.</p><br><br><br><br>
				<h2>Format</h2>
				<p>A4 - (210x297mm) is twice the size of A5, and half the size of A3.</p><br>
				<h2>Paper Type</h2>
				<p>250gsm - White color material with line texture to make your certificate stand out to the touch.</p><hr>
				<h2 style="text-align:center">RM 3.00/pcs </h2>
			</div>
			<button type="submit" name="certificate" id="div3"><span>SELECT</span></button>
			</div><br><br><br>
		</div>
		<div class="column menu">
			<div class="border">
				<div class="container">
				<h2>Menu</h2>
				</div><hr>
				<img src="Image/menu.jpg" alt="menu" style="width:100%;height:300px"><br><br><hr>
				<div class="text">
					<h2>Information</h2>
					<p>If you are a restaurant owner, menus are a must-have. 
					High-quality menus are the secret recipe for your food business 
					to build a positive first impression and attract the most picky foodies. 
					Whether you want to enhance your guests’ in-house dining experience or simply
					promote repeat orders by putting menus inside each take-away order, 
					custom menus printing is a necessity for every restaurant and bar.</p><br>
					<h2>Format</h2>
					<p>DIN A4 -(210x297mm) is twice the size of DIN A5, and half the size of DIN A3.</p><br>
					<h2>Paper Type</h2>
					<p>157g Art Paper - 157g Art paper makes for sturdy and classy products.</p><hr>
				<h2 style="text-align:center">RM 5.00/pcs </h2>
				</div>
			<button type="submit" name="menu" id="div3"><span>SELECT</span></button>
			</div>
			<br><br>
		</div>
		<div class="column ticket">
			<div class="border">
				<div class="container">
					<h2>Event Ticket</h2>
				</div><hr>
			<img src="Image/event ticket.jpg"  alt="ticket" style="width:100%"><br><br><hr>
			<div class="text">
				<h2>Information</h2>
				<p>Create bombastic event ticket  for any occasion (forums, events and much more ).</p>
				<pre>- As low as = RM 3.04 /pcs (Above 100 pcs)</pre>
				<pre>- Full color printing</pre><br><br><br><br><br>
				<h2>Format</h2>
				<p>4C (140mm X 90mm)</p><br>
				<h2>Paper Type</h2>
				<p>4C</p><hr>
				<h2 style="text-align:center">RM 3.00/pcs </h2>
			</div>
			<button type="submit" name="ticket" id="div3"><span>SELECT</span></button>
			</div>
		</div>
		<div class="column voucher">
			<div class="border">
				<div class="container">
				<h2>Voucher</h2>
				</div><hr>
				<img src="Image/voucher.png" alt="voucher" style="width:100%" ><br><br><hr>
				<div class="text">
					<h2>Information</h2>
					<p>Create bombastic event ticket  for any occasion (forums, events and much more ).</p>
					<pre>- As low as = RM 3.04 /pcs (Above 100 pcs)</pre>
					<pre>- Full color printing</pre><br>
					<h2>Format</h2>
					<p>4C (140mm X 90mm)</p><br><br><br><br><br><br>
					<h2>Paper Type</h2>
					<p>4C</p><hr>
				<h2 style="text-align:center">RM 3.00/pcs </h2>
				</div>
			<button type="submit" name="voucher" id="div3"><span>SELECT</span></button>
			</div>
		</div>
		<div class="column card">
			<div class="border">
				<div class="container">
				<h2>Invitation Card</h2>
				</div><hr>
				<img src="Image/Invitation.jpg" alt="Invitation card" style="width:100%;height:230px" ><br><br><hr>
				<div class="text">
					<h2>Information</h2>
					<p>Send out invitation cards to celebrate a special occasion or your business’ milestone. 
					Printing invitation cards with a personalised message and sending them to your customers 
					or loved ones will make them feel valued. Invitation cards are a great tool for 
					businesses to maintain and strengthen relationships within the organisation 
					as well as outside.</p><br>
					<h2>Format</h2>
					<p>4 x 6 inch (10.16 x 15.24cm)</p><br>
					<h2>Paper Type</h2>
					<p>260g Art Card - The right balance between cost saving and premium feel. The weight of paper 
					is perfect and any coating is suitable</p>
					<hr>
				<h2 style="text-align:center">RM 3.00/pcs </h2>
				</div>
			<button type="submit" name="invitation" id="div3"><span>SELECT</span></button>
			</div>
			<br><br>
		</div>
	<div class="column card">
			<div class="border">
				<div class="container">
					<h2>Celebration Card</h2>
				</div><hr>
			<img src="Image/celebration.jpg"  alt="celebration card" style="width:100%"><br><br><hr>
			<div class="text">
					<h2>Information</h2>
					<p>Celebration Card is a card that used for celebration party, birthday event, or graduated to celebrate the happy moment with your frieds or family. So, celebration card is most 
					suitable to give to your loving person to invite them come to celebration.</p><br>
					<h2>Format</h2>
					<p> 5" x 7" </p><br>
					<h2>Paper Type</h2>
					<p>157g Art Paper- 157g Art paper makes for sturdy and classy products.</p><br><br><br><br><br><br>
					<hr>
				<h2 style="text-align:center">RM 2.00/pcs </h2>
				</div>
			<button type="submit" name="card" id="div3"><span>SELECT</span></button>
			</div>
		</div>
		<div class="column pocket">
			<div class="border">
				<div class="container">
				<h2>Money Pocket</h2>
				</div><hr>
				<img src="Image/money pocket.jpg" alt="money pocket" style="width:100%" ><br><br><hr>
				<div class="text">
					<h2>Information</h2>
					<p>Printing Money Packets brings true value to any company and marketing 
					campaign. They are a creative and affordable way to get your brand 
					across potential business prospects and improve awareness. You can choose from our 
					range of Money Packets selection that best fits your needs. Rest assured Gogoprint offers something 
					for everyone - from customized money packets to standard money packets, we have it all.</p><br>
					<h2>Format</h2>
					<p>Money Packet (25.99 x 21.6 cm) is folded to be closed. </p><br>
					<h2>Paper Type</h2>
					<p>157g Art Paper- 157g Art paper makes for sturdy and classy products.</p><br><br><br>
					<hr>
				<h2 style="text-align:center">RM 6.00/pcs </h2>
				</div>
			<button type="submit" name="pocket" id="div3"><span>SELECT</span></button>
			</div>
		</div>
		<div class="column menu">
			<div class="border">
				<div class="container">
				<h2>Folded Menu</h2>
				</div><hr>
				<img src="Image/menu folded.png" alt="certificate" style="width:100%" ><br><br><hr>
				<div class="text">
					<h2>Information</h2>
					<p>If you are a restaurant owner, menus are a must-have. High-quality menus are the secret recipe for
					your food business to build a positive first impression 
					and attract the most picky foodies. Whether you want to enhance 
					your guests’ in-house dining experience or simply promote repeat orders by 
					putting menus inside each take-away order, custom menus printing is a necessity for every 
					restaurant and bar.</p><br>
					<h2>Format</h2>
					<p>DIN A3 - DIN A3 (297x420mm) is twice the size of DIN A4, 
					and half the size of DIN A2.</p><br>
					<h2>Paper Type</h2>
					<p>157g Art Paper - 157g Art paper makes for sturdy and classy products.</p><br>
					<h2>Folding</h2>
					<p>Zigzag Fold</p><hr>
				<h2 style="text-align:center">RM 5.00/pcs </h2>
				</div>
			<button type="submit" name="menu2" id="div3"><span>SELECT</span></button>
			</div>
		</div>
	</div>
	</form>
	<div id="id01" class="modal">
		<form class="modal-content animate" action="/action_page.php" method="post">
			<div class="imgcontainer">
			  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h2>Order History</h2>
				</div>					
				<div class="container2">
				  <?php
					$i = 1;
					if (mysqli_num_rows($result2) > 0) {
						//output data of each row
							while($row = mysqli_fetch_assoc($result2)) {
								
								echo "<div><h1>Order ".$i."</h1><br></div><b>Order Date</b><div class='text2'>".$row["order_date"]."</div><b>Package Name</b><div class='text2'>".$row["type"]."</div><b>Total Price</b><div class='text2'>".$row["total_price"]."</div>";
							}
						} 
						else {
							echo "No Order History";
						}
						?>
				</div>
		</form>
	</div>
	<br><br><br>
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
<script>
//For filter function script//
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function myFunction2(x) {
  x.classList.toggle("change");
}

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>	
	

</body>
</html>