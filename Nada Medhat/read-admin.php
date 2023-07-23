<div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Book <b>Details</b></h2>
                    </div>
<?php
session_start();
include('dbconnection.php');
$vtitle=$_GET['viewtitle'];
$_SESSION['vtitle']=$vtitle;
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
<th width="200"> image </th>
<td><img src="image/<?php  echo $row['image'];?>" width="100" height="200"></td>
</tr>
 
 <tr>
    <th> Title </th>
    <td><?php  echo $row['title'];?></td>
    <th> Author Name </th>
    <td><?php  echo $row['authorName'];?></td>
  </tr>
  <tr>
    <th> Publication Date </th>
    <td><?php  echo $row['publicationDate'];?></td>
    <th> Description </th>
    <td><?php  echo $row['description'];?></td>
  </tr>
<?php 
$cnt=$cnt+1;
}?>
        
</tbody>
</table>

<table class="table table-striped table-hover">
<thead>
    <h2> Comments </h2>
    <tr>
        <th> # </th>
        <th> Name </th>
        <th> Content </th>
        <th> Rating </th>
    </tr>
</thead>
<tbody>
<?php
    include('dbconnection.php');
    $ret1=mysqli_query($con,"select * from reviews where title like '$vtitle'");
    $row1=mysqli_num_rows($ret1);
    $cnt=1;

    if($row1>0){
    while ($row1=mysqli_fetch_array($ret1)) {
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php  echo $row1['name'];?></td>
<td> <?php  echo $row1['content'];?></td>
<td><?php  echo $row1['rating'];?></td>
</tr>
<?php 
$cnt=$cnt+1;

} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found
    </th>
</tr>
<?php } ?>                 

</tbody>
</table>
<a href="comment.php" class="comment" title="Comment" data-toggle="tooltip"><i class="material-icons">&#xE254;</i> comment</a>
<br>
