<?php
    session_start();
    $name=$_SESSION['name'];
?>

<div class="container">
        <h1>Welcome to Dashboard <?php print($name)?> </h1>
        <h2> You'r Admin, Do what you need :) </h2>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>

<form align="center" action="./searchbook.php" method="GET" enctype="multipart/form-data">
    <label for="bookTitle">Search by book title</label><br>
    <input type="text" name="booktitle" placeholder="Search for books"/>
    <input type="submit" value="Search" />
</form>
<br>
<form align="center" action="./searchauthor.php" method="GET" enctype="multipart/form-data">
    <label for="authorName">Search by author naem</label><br>
    <input type="text" name="authorname" placeholder="Search for books"/>
    <input type="submit" value="Search" />
</form>

<table class="table table-striped table-hover">
<thead>
    <tr>
        <th>#</th>
        <th>Image</th>
        <th>Title</th>                       
        <th>AuthorName</th>
        <th>Publication Date</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php
    include('dbconnection.php');
    include('./database/sql.php');
    $ret=mysqli_query($con,"select * from books");
    $cnt=1;
    $row=mysqli_num_rows($ret);
    if($row>0){
        while ($row=mysqli_fetch_array($ret)) {
            ?>

<tr>
<td><?php echo $cnt;?></td>
<td><img src="image/<?php  echo $row['image'];?>" width="100" height="200"></td>
<td><?php  echo $row['title'];?></td>
<td><?php  echo $row['authorName'];?></td>                        
<td> <?php  echo $row['publicationDate'];?></td>
<td><?php  echo $row['description'];?></td>
<td>
<a href="read-admin.php?viewtitle=<?php echo htmlentities ($row['title']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i> view </a>
<a href="edit.php?edittitle=<?php echo htmlentities ($row['title']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i> edit </a>
<a href="delete.php?deltitle=<?php echo htmlentities ($row['title']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i> delete </a>
</td>
</tr>
<?php 
$cnt=$cnt+1;
} } else {?>
<tr>
<th style="text-align:center; color:red;" colspan="6">No Record Found
<a href="insert.php" class="insert" title="Insert" data-toggle="tooltip"><i class="material-icons">&#xE254;</i> insert</a>
</th>
</tr>
<?php } ?>                 
                
</tbody>
</table>
<br>
<a href="insert.php" class="insert" title="Insert" data-toggle="tooltip"><i class="material-icons">&#xE254;</i> insert </a>