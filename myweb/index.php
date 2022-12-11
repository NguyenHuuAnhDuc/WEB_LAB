<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head> 
<title>My first website</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link href="myStyle.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="image/logo.svg" sizes="96x96"/>	
</head>
<body>
	<div class="head">
	  <img id="logo" src = "image/logo.svg" alt="Logo"/>
	  <h1><b>Ho Chi Minh City University of Technology</b><br>
        <p><b>VIETNAM NATIONAL UNIVERSITY - HO CHI MINH</b></p>
      </h1>
      <br>
	</div>  

	<div class="navbar">
		<a href="index.php?page=home#about" class="w3-bar-item w3-button">
            <i class="fa fa-fw fa-home"></i> Home
        </a> 
        <a href="#contact" class="w3-bar-item w3-button w3-hide-small">
            <i class="fa fa-fw fa-book"></i> Contact
        </a>
        <div class="dropdown">
		  <button class="dropbtn w3-bar-item w3-button"><i class="fa fa-fw fa-university"></i>
		   Partner universities</button> 
			<div class="dropdown-content">
			  <a href="index.php?page=more#more">The University of Queensland</a>
			  <a href="index.php?page=more#more">University of Illinois</a>
			  <a href="index.php?page=more#more">Kanazawa Univeristy</a>
			</div>
		</div> 
        <a href="index.php?page=search#id03" onclick="document.getElementById('id03').style.display='block'"
			class="w3-bar-item w3-button">
            <i class="fa fa-fw fa-search"></i> Search
        </a>
		<div class="dropdown">
		  <button class="dropbtn w3-bar-item w3-button" href="index.php?page=product#our">
		   Products<i class="fa fa-fw fa-chevron-down"></i></button> 
			<div class="dropdown-content">
			  <a href="index.php?page=product#our">Front-end course</a>
			  <a href="index.php?page=product#our">Back-end course</a>
			  <a href="index.php?page=product#our">Fullstack course</a>
			</div>
		</div> 
		
        <?php 
            if(isset($_SESSION['loggedin'])){?>
                <div class="dropdown w3-right">
                    <button class="dropbtn w3-bar-item w3-button" >
                        Hi, <?php echo $_SESSION['username'].':' ?>
                        <?php 
                            require_once('connection.php');
                            $name =  $_SESSION['username'];
                            $query = "SELECT role FROM users WHERE username= '$name'";
                            $get_result = mysqli_query($conn,$query);
                            $name_val = mysqli_fetch_assoc($get_result);
                            echo $name_val['role'];
                        ?> 
                    </button> 
                    <div class="dropdown-content">
                        <a href="index.php?page=reset#id05" onclick="document.getElementById('id05').style.display='block'">
                            <i class="fa fa-key"></i> Reset password
                        </a>
                        <a onclick="document.getElementById('id04').style.display='block'"
                            href="index.php?page=logout#id04" style="width:auto;">
                            <i class="fa fa-fw fa-sign-out"></i> Logout
                        </a> 
                    </div>
                </div> 
                <a class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id02').style.display='block'"
                    href="index.php?page=register#id02" style="width:auto;">
                    <i class="fa fa-fw fa-user-circle-o"></i> Sign up
                </a>
        <?php } else{?>
                <a class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id01').style.display='block'"
                    href="index.php?page=login#id01" style="width:auto;">
                    <i class="fa fa-fw fa-sign-in"></i> Login
                </a> 
                <a class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id02').style.display='block'"
                    href="index.php?page=register#id02" style="width:auto;">
                    <i class="fa fa-fw fa-user-circle-o"></i> Sign up
                </a>
        <?php }
        ?>
		<!-- <a class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id01').style.display='block'"
        href="index.php?page=login#id01" style="width:auto;">
            <i class="fa fa-fw fa-sign-in"></i> Login
        </a> 
        <a class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id02').style.display='block'"
        href="index.php?page=register#id02" style="width:auto;">
            <i class="fa fa-fw fa-user-circle-o"></i> Sign up
        </a> -->
	</div>
    <?php
        if(isset($_POST['product'])){
            include'search_processing.php';
        }
    ?>
    <div class="w3-content" style="max-width:2000px;margin-top:0px" >
        <div class="slideshow-container">

            <div class="mySlides fade w3-display-container w3-center">
                <img src="image/bk1.jpg" class="w3-animate-left" style="width:100%">
            </div>
            
            <div class="mySlides fade w3-display-container w3-center">
                <img src="image/bk3.jpg" class="w3-animate-left" style="width:100%; height: 700px;">
            </div>
            
            <div class="mySlides fade w3-display-container w3-center">
                <img src="image/bk4.jpg" class="w3-animate-left" style="width:100%;height: 700px;">
            </div>
            
            <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
        </div>   
    </div>
    <?php
        if(array_key_exists('page',$_GET)){
            switch($_GET['page']){
                case 'home':
                    include 'home.php';
                    break;
                case 'login': 
                    include 'login.php';
                    break;  
                case 'logout': 
                    include 'modal_logout.php';
                    break;
                case 'reset': 
                    include 'reset-password.php';
                    break;    
                case 'more':
                    include 'partner.php';
                    break;
                case 'register':    
                    include 'register.php';
                    break;
                case 'product':    
                    include 'product.php';
                    break;
                case 'search':
                    include 'search.php';
                    break;
                default:
                    include 'notfound.php';
                    break;
            }
        } else {
            echo"";
        }    
    ?>
    <!-- The Contact Section -->
    <footer class="w3-padding-32 w3-center w3-pale-blue">
        <div class="w3-container w3-content w3-padding-32 w3-xlarge" style="max-width:800px" id="contact">
            <h2 class="w3-wide w3-left">CONTACT</h2>
            <h2 class="w3-wide w3-right">FOLLOW US</h2>
            <div class="w3-row w3-padding-32">
                <div class="w3-col m6 w3-large w3-margin-bottom w3-left-align">
                    <a href="https://goo.gl/maps/szpVbcu425fgrxJw7" target="_blank" style="color:darkred">
                        <i class="fa fa-map-marker" style="width:30px; color:darkred;"></i> Ho Chi Minh City, Vietnam
                    </a>
                    <br>
                    <i class="fa fa-phone" style="width:30px; color:darkgreen;"></i> Tel: +84 28 7300 4183<br>
                    <i class="fa fa-envelope" style="width:30px; color:darkblue;"> </i> <a href="mailto:admission@oisp.edu.vn">Email: admission@oisp.edu.vn</a> <br>
                </div>
                <div class="w3-col m6 w3-xlarge w3-margin-bottom w3-right-align">
                    <a class="fa fa-facebook-official" style="color:darkblue;" target="_blank"
                    href="https://www.facebook.com/truongdhbachkhoa/">
                    </a>
                    <a class="fa fa-instagram" style="color:rgb(170, 145, 34);" target="_blank"
                    href="https://www.instagram.com/truongdaihocbachkhoa.1957/?fbclid=IwAR23WtLTFk3UbcukkHukY-8B8EwSqxTb8Dfx8D5pKUGB8gCKTLhs2Y7MHQo">
                    </a>
                    <a class="fa fa-youtube-play" style="color:red;" target="_blank"
                    href ="https://www.youtube.com/channel/UCl4zLzbk82yGnpRDNTaYKow/featured">
                    </a>
                    <a class="fa fa-pinterest-p" style="color:darkmagenta;"></a>
                    <a class="fa fa-twitter" style="color:blue;"></a>
                    <p class="w3-large">For more information please visit
                        <a href="https://oisp.hcmut.edu.vn/en/" 
                        style="color:darkgreen;" target="_blank">this
                        </a>
                        website
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <a id="backtotop" onclick="topFunction()" title="Go to top"><i class="fa fa-fw fa-chevron-up"></i></a>
    <script src="myScript.js"></script>

    
</body>
</html>