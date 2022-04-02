<?php
include('includes/header.php');
?>


<html>
<head>
    <meta charset="utf-8">
    <Title>
        Home
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
  

 <div class="content-wrapper">
   
 <?php  if(!isset($_GET['action'])) {?>

    <img id="header" src="images/header.png"  >
 </div>

  <div class="feature-products">
    
 </div>    
    
    
  <!--------------Dynamically add products from database to main-page--------------->
   <div id ="content_area">
        
        <?php
           cart();
        ?>
       
        <div id="products_box">
           
            
            <?php getPro(); ?>
            
                
        </div>
    </div>   
    <?php }else{ ?>    
    
    <?php 
    include('login.php');
    }
    ?>  
    </div>
    <div class="feature-products">
    
    </div>
    
<footer>

  
    Foxy-Fashion<br>
 


<!-- <hr width="100%"> -->
<ul class="list">
        <li>
        <a href="#">Home</a>
        </li>
        <li>
        <a href="#">Services</a>
        </li>
        <li>
        <a href="#">About</a>
        </li>
        <li>
        <a href="#">Terms</a>
        </li>
        <li>
        <a href="#">Contact</a>
        </li>
    </ul>
<p style="font-size: 30px; margin: 15px;">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-twitter"></a>
</p> 
    <p class="copyright">
        Copyright @2022
    </p> 
</footer>

</body>

 
</html>