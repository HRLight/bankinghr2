<?php
include('includes/load.php');

if(isset($_POST['room_name'])){
$rn = $_POST['room_name'];
if(!empty($rn)){
if($rn == 'others'){ ?>

   <br><br><input type="text" name="loca" class="form-control" required placeholder="  Input External Location">

<?php }else{
    
   
   $sql = "SELECT * FROM facility WHERE name_of_room = '$rn'";
   $res = $db->query($sql);
   $room = $res->fetch_assoc();
   
 ?>
<img src="../Administrative/<?php echo $room['image']?>" class ="image-responsive image-thumbnail" >

<?php } } } ?>