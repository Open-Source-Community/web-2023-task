<?php
class sql{
    function insert($title, $authorName, $imgnewfile, $description, $pubDate){
        mysqli_query($con, "insert into books(title, authorName, image, description, publicationDate) value('$title','$authorName', '$imgnewfile', '$description', '$pubDate')");
    }
}
?>