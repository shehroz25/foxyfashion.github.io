<style>

.delete_account_container{
    padding:10px;
}
.delete_account_box{
width:30%;
}

.delete_account_box input[type=submit]{
    padding: 7px 15px;
    margin: 20px;
    float:right;
    border: none;
}
.yes_btn{
    background:rgba(3,169,252,0.9);
    color white;
}
</style>

<div class="delete_account_container">
   <h2 style="text-align:left">Confirm box</h1>
   <hr/>
   <br>
   <div class="delete_account_box">
     <h3>Are you sure u want to delete your account?</h1>

     <form action="" method="post">
     <input type="submit" class="yes_btn" name="yes" value="yes"/>
     <input type="submit" name="cancel" value="cancel"/>
   </div>


</div>
<?php

if(isset($_POST['yes'])){

        $delete_account=mysqli_query($con,"delete from users where id='$_SESSION[user_id]' ");
        session_destroy();
        echo "<script>alert('Your account has been deleted!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
}

if(isset($_POST['cancel'])){
        echo "<script>window.open(window.location.href,'_self')</script>";
}

?>