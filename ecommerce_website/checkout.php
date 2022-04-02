<?php include('includes/header.php');
?>


<html>
<head>
    <Title>
       Checkout
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>

    

   <div id ="content_area_checkout">
        
        <?php
           if(!isset($_SESSION['user_id'])){
            include('login.php');
           }else{
               include('payment.php');
           }
           
           
        
        
        ?>
       
        
    </div>        


   














</body>
</html>