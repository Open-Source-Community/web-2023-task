<?php 
include('dbconnection.php');
if(isset($_POST['submit']))
  {
$title=$_GET['title'];
$image=$_FILES["image"]["name"];
$oldimage=$_POST['image'];
$oldbimage="L:/'OSC Web Development'/xampp/htdocs/WeBook/image/".$oldimage;
$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".PNG", ".png");
if(!in_array($extension,$allowed_extensions))
{
    echo "<script>alert('Invalid format. Only png format allowed');</script>";
}
else
{
    $imgnewfile=md5($imgfile).time().$extension;
    move_uploaded_file($_FILES["image"]["tmp_name"], "L:/'OSC Web Development'/xampp/htdocs/WeBook/image/".$image);
    $query=mysqli_query($con, "update books set image='$image' where title like '$title' ");
    if ($query) {
        unlink($oldbimage);
        echo "<script>alert('book image updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='Index.php'; </script>";
    }else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
?>

<form  method="POST" enctype="multipart/form-data">
<?php
$etitle=$_GET['title'];
$ret=mysqli_query($con,"select * from tblusers where title='$etitle'");
while ($row=mysqli_fetch_array($ret)) {
?>
 
<h2>Update </h2>
<p class="hint-text">Update Book Image.</p>
<input type="hidden" name="image" value="<?php  echo $row['image'];?>">
<div class="form-group">
<img src="<?php  echo $row['image'];?>" width="100" height="200">
</div>
 
<div class="form-group">
<input type="file" class="form-control" name="image"  required="true">
<span style="color:red; font-size:12px;">Only png format allowed.</span>
</div> 
 
<div class="form-group">
<button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
</div>
<?php }?>
</form>