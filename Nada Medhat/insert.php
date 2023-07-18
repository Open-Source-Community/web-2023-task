<?php 

include('dbconnection.php');

if(isset($_POST['submit']))
  {
    $title=$_POST['title'];
    $authorName=$_POST['authorName'];
    $image=$_FILES["image"]["name"];
    $description=$_POST['description'];
    $pubDate=$_POST['pubDate'];

$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".PNG", ".png");
if(!in_array($extension,$allowed_extensions))
{
    echo "<script>alert('Invalid format. Only png format allowed');</script>";
}
else
{
    $imgnewfile=md5($imgfile).time().$extension;
    move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$imgnewfile);
    $query=mysqli_query($con, "insert into books(title, authorName, image, description, publicationDate) value('$title','$authorName', '$image', '$description', '$pubDate')");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='Index.php'; </script>";
    } else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }}
}
?>

<form  method="POST" enctype="multipart/form-data" >
<h2>Fill Data</h2>
<p class="hint-text">Fill below form.</p>
 
<div class="form-group">
<div class="row">
<div class="col"><input type="text" class="form-control" name="title" placeholder="Book Title" required="true"></div>
<div class="col"><input type="text" class="form-control" name="authorName" placeholder="Author Name" required="true"></div>
</div>        	
</div>
 
    <div class="form-group">
        <input type="file" class="form-control" name="image"  required="true">
        <span style="color:red; font-size:12px;">Only png format allowed.</span>
    </div>    

    <div class="form-group">
     <textarea class="form-control" name="description" placeholder="Description of the Book" required="true"></textarea>
    </div>  
    
    <div class="form-group">
        <input type="date" class="form-control" name="pubDate" placeholder="Publication Date" required="true">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
    </div>
</form>