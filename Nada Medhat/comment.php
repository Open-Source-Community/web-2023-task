<?php 
session_start();
include('dbconnection.php');
include('./controllers/Login.php');
    $name=$_SESSION['name'];
    $title=$_SESSION['vtitle'];
    $ID=$_SESSION['id'];
if(isset($_POST['submit']))
  {
    $content=$_POST['content'];
    $rating=$_POST['rating'];
    $lastID=file_get_contents('lastIDofReviews.txt');
    $lastID = (int)$lastID + 1;
    file_put_contents('lastIDofReviews.txt',$lastID);
    $query=mysqli_query($con, "insert into reviews(ID, title, content, rating, name) value('$lastID', '$title','$content', '$rating', '$name')");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        if ($_SESSION['admin'] == 'yes') {
            header("Location:read-admin.php?viewtitle=<?php echo htmlentities (".$_SESSION."['vtitle']);?>");
        }else{
            header("Location:read.php?viewtitle=<?php echo htmlentities (".$_SESSION."['vtitle']);?>");
        }
    } else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
  }
?>

<form method="POST" enctype="multipart/form-data" >
<h2>Comment</h2>
<p class="hint-text">Post Your Opinion</p>
    <div class="form-group">
     <textarea class="form-control" name="content" placeholder="Content of Comment"></textarea>
    </div>  
    
    <div class="form-group">
        <input type="number" class="form-control" name="rating" placeholder="rating" required="true">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" onclick="echo $_SERVER['HTTP_REFERER']">Save</button>
    </div>
</form>