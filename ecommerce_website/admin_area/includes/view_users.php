<div class="view_product_box">

<h2>View users</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data"/>

<table width ="100%">
<thead>
   <tr>
     <th><input type="checkbox" id="checkAll">Check</th>
     <th>ID</th>
     <th>Name</th>
     <th>Email</th>
     <th>Image</th>
     <th>Status</th>
     <th>Delete</th>
     
    </tr>    

</thead>

<?php

$all_users=mysqli_query($con,"select * from users order by id DESC");
$i=1;

while($row=mysqli_fetch_array($all_users)){

?>

 <tbody>
   <tr>
  <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['id'];  ?>"></td>
  <td><?php echo $i;  ?></td>
  <td><?php echo $row['name'];  ?></td>
  <td><?php echo $row['email'];  ?></td>
  <td><img src="../upload-files/<?php echo $row['image'];  ?>"width="70" height="50"/></td>
  
  <td>
      
  <?php
  if($row['visible'] == 1){
    echo"approved";
  }else{
    echo"pending";
  }
  ?>
  </td>
  <td><a href="index.php?action=view_users&delete_user=<?php echo $row['id']; ?>">Delete</a>
  </td>
  
   </tr>
</tbody>

<?php $i++; } ?>
<tr>
  <td><input type="submit" name="delete_all" value="Remove"></td>
<tr>  
</table>
</form>    

</div>

<?php

// Delete user account from admin panel

if(isset($_GET['delete_user'])) {
   $delete_user = mysqli_query($con,"delete from users where id='$_GET[delete_user]' ");

  if($delete_user){
    echo"<script>alert('Account has been deleted succesfully!')</script>";
    echo"<script>window.open('index.php?action=view_users','_self')</script>";
 }
}



if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];

  foreach($remove as $key){

  $run_remove=mysqli_query($con,"delete from users where id='$key'");  
  
  if($run_remove){
  
  echo"<script>alert('Items selected has been removed succesfully!')</script>";
  echo"<script>window.open('index.php?action=view_users','_self')</script>";
  
  }else{
  
  echo"<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";  
  }
}
}



?>