<head>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<?php

$con = mysqli_connect("localhost","root","","dbecommerce_website");

if(mysqli_connect_errno()){
    echo"failed to connect with database".mysqli_connect_error();
}

function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//--------------Dynamically add category from database to main-page--------------->
function getCats(){
            
            global $con;
            $get_cats = "select * from categories";
            $run_cats = mysqli_query($con,$get_cats);
            while($row_cats=mysqli_fetch_array($run_cats)){
                $cat_id=$row_cats['cat_id'];
                $cat_title=$row_cats['cat_title'];

                echo"<li><a href='index.php'?cat=$cat_id'>$cat_title</a></li>";

            }
}
//--------------Dynamically add products from database to main-page
function getPro(){

    if(!isset($_GET['cat'])){
        global $con;
        $get_pro="select * from products";
        $run_pro=mysqli_query($con,$get_pro);

        while($row_pro= mysqli_fetch_array($run_pro)){

            $pro_id=$row_pro['product_id'];
            $pro_cat=$row_pro['product_cat'];
            $pro_title=$row_pro['product_title'];
            $pro_price=$row_pro['product_price'];
            $pro_image=$row_pro['product_image'];

            echo"
                    <div id='single_product'>
                    <h3>$pro_title</h3>
                    <img src='admin_area/product_images/$pro_image'width='180'height='180'/>
                    <p><b>Price:$pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id'>Details</a>
                    <a href='index.php?add_cart=$pro_id'>
                    <input type='button' class='btns' value='Add to cart'>
                    </a>
                    </div>
                ";    


        }
        }

}
function get_pro_by_cat_id(){
    if(isset($_GET['cat'])){
        $cat_id=$_GET['cat'];
        
       
        $get_cat_pro="select * from products where product_cat='$cat_id' ";
        $run_cat_pro=mysqli_query($con,$get_cat_pro);
        $count_cats=mysqli_num_rows($run_cat_pro);
        if($count_cats == 0){
            echo "<h2 style='padding: 20px;'>No product in this category!</h2>";
        }
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
            $pro_id=$row_cat_pro['product_id'];
            $pro_cat=$row_cat_pro['product_cat'];
            $pro_title=$row_cat_pro['product_title'];
            $pro_price=$row_cat_pro['product_price'];
            $pro_image=$row_cat_pro['product_image'];

            echo"
            <div id='single_product'>
            <h3>$pro_title</h3>
            <img src='admin_area/product_images/$pro_image' width='180'height='180'/>
            <p><b>Price: $pro_price</b></p>
            <a href='details.php?pro_id=$pro_id'>Details</a>
            <a href='index.php?add_cart=$pro_id'>
            <input type='button' class='btns' value='Add to cart'>
            </a>


          </div> 

            
            ";
        }
    }
}
//--------------this will add the selected items quantity on cart icons--------------->
function total_items(){
    global $con;
    $ip=get_ip();
    $run_items = mysqli_query($con,"select * from cart where ip_address='$ip'");
    echo $count_items=mysqli_num_rows($run_items);
}

//--------------this will add the selected items quantity on cart icons--------------->
function cart(){
    global $con;
    if(isset($_GET['add_cart'])){
        $product_id=$_GET['add_cart'];
        $ip=get_ip();
        $run_check_pro=mysqli_query($con,"select * from cart where product_id='$product_id'");
        
        if(mysqli_num_rows($run_check_pro) > 0){
            echo "";
        }else{
            $fetch_pro=mysqli_query($con,"select * from products where product_id='$product_id'");
            $fetch_pro=mysqli_fetch_array($fetch_pro);
            $pro_title=$fetch_pro['product_title'];
            $run_insert_pro=mysqli_query($con,"insert into cart(product_id,product_title,ip_address) values('$product_id','$pro_title','$ip')");
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
}

function total_price(){
    global $con;
    $total =0;
    $ip=get_ip();
    $run_cart=mysqli_query($con,"select * from cart where ip_address='$ip'");
    while($fetch_cart=mysqli_fetch_array($run_cart)){
        $product_id=$fetch_cart['product_id'];
        $result_product=mysqli_query($con,"select * from products where product_id='$product_id'");
        
        while($fetch_product=mysqli_fetch_array($result_product)){
            
            $product_price=array($fetch_product['product_price']);
            $product_title=$fetch_product['product_title'];
            $product_image=$fetch_product['product_image'];
            $sing_price=$fetch_product['product_price'];
            $values=array_sum($product_price);
            // this will tell us the quantity of product
            $run_qty=mysqli_query($con,"select * from cart where product_id='$product_id'");
            $row_qty=mysqli_fetch_array($run_qty);
            $qty=$row_qty['quantity'];
            $values_qty = $values * $qty; 

            $total += $values_qty;
            
        }
    
    }
    echo "$".$total;
}





?>