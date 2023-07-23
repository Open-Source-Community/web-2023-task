<?php 
include('dbconnection.php');
if(isset($_POST['submit']))
  {
  $etitle=$_GET['edittitle'];
  $title=$_POST['title'];
  $authorName=$_POST['authorName'];
  $image=$_FILES["image"]["name"];
  $description=$_POST['description'];
  $pubDate=$_POST['pubDate'];
  
$query=mysqli_query($con, "update  books set title='$title',authorName='$authorName', image='$image', description='$description', publicationDate='$pubDate' where title like '$etitle'");
 
if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='Index.php'; </script>";
}
else
{
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
}
}
?>

<form  method="POST">
 <?php
$etitle=$_GET['edittitle'];
$ret=mysqli_query($con,"select * from books where title like '$etitle'");
while ($row=mysqli_fetch_array($ret)) {
?>
 
<h2>Update </h2>
<p class="hint-text">Update book info.</p>
 
<div class="form-group">
<img src="<?php  echo $row['image'];?>" width="100" height="200">
<a href="change-image.php?title=<?php echo $row['title'];?>">Change Image</a>
</div>
 
<div class="form-group">
<div class="row">
<div class="col"><input type="text" class="form-control" name="title" placeholder="Book Title" required="true"></div>
<div class="col"><input type="text" class="form-control" name="authorName" placeholder="Author Name" required="true"></div>
</div>        	
</div>
 
<div class="form-group">
    <textarea class="form-control" name="description" placeholder="Description of the Book" required="true"></textarea>
</div>  

<div class="form-group">
    <input type="date" class="form-control" name="pubDate" placeholder="Publication Date" required="true">
</div>
 
<?php 
}?>
 
<div class="form-group">
    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
</div>
</form>