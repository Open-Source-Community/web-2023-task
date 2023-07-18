<?php
include('dbconnection.php');
if(isset($_GET['deltitle']))
{
    $rtitle=intval($_GET['deltitle']);
    $image=$_GET['image'];
    $imagepath="image"."/".$image;
    $sql=mysqli_query($con,"delete from books where title like '$rtitle'");
    unlink($imagepath);
    echo "<script>alert('Book deleted');</script>"; 
    echo "<script>window.location.href = 'Index.php'</script>";     
} 
?>