<div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Book <b>Details</b></h2>
                    </div>
<?php
include('dbconnection.php');
$vtitle=$_GET['viewtitle'];
$ret=mysqli_query($con,"select * from books where title like '$vtitle'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
 
?>
 <br>
<div class="col-sm-7">
<a href="edit.php?edittitle=<?php echo htmlentities ($row['title']);?>" class="btn btn-primary"><span>Edit Book Details</span></a>
</div>
</div>
</div>
 
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<tr>
<th width="200">image</th>
<td><img src="image/<?php  echo $row['image'];?>" width="100" height="200"></td>
</tr>
 
 <tr>
    <th>Title</th>
    <td><?php  echo $row['title'];?></td>
    <th>Author Name</th>
    <td><?php  echo $row['authorName'];?></td>
  </tr>
  <tr>
    <th>Publication Date</th>
    <td><?php  echo $row['publicationDate'];?></td>
    <th>Description</th>
    <td><?php  echo $row['description'];?></td>
  </tr>
<?php 
$cnt=$cnt+1;
}?>
                 
</tbody>
</table>