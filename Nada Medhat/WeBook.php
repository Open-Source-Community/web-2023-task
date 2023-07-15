
<!DOCTYPE html>

<html>

<head>

    <title>Image Upload in PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <div class="center">
        <h3> Search for Books </h3>

        <form method="GET" action="" enctype="multipart/form-data">

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" autofocus><br>

            <p> Or </p>

            <label for="authorName">Author Name:</label><br>
            <input type="text" id="authorName" name="authorName"><br><br>

            <button type="submit" name="Search" >

                Search

            </button>

        </form>
    </div>

    <hr>

    <div class="center">
        <h3> insert a row </h3>
        <button type="submit" name="insert" onclick="textBoxesAppear()">

            insert a row

        </button>
    </div>

    <hr>
    
</body>

</html>
<?php

error_reporting(0);

?>

<?php
$db = mysqli_connect("localhost", "root", "", "WeBook"); 

if (isset($_GET['Search'])) {
    $title = $_FILES["title"]["name"];
    $Aname = $_FILES["authorName"]["name"];
    if($title != NULL) {
        $sql = "SELECT * FROM Books WHERE title = '$title'";
    }
    else if($Aname != NULL) {
        $sql = "SELECT * FROM Books WHERE authorName = '$Aname'";
    }
    else{
        ptintf("Please enter a title of author name to search for books");
    }
    $results = mysqli_query($db, $sql);

    printf(
        "<table class='table container mt-4'>
        <thead>
            <tr>
                <th scope='col'>Title</th>
                <th scope='col'>Author Name</th>
                <th scope='col'>Image</th>
                <th scope='col'>Description</th>
                <th scope='col'>Publication Date</th>
            </tr>
        </thead>
        </table>");   
        
    foreach ($results as $row) {
        printf(
        "<table class='table container mt-4'>
        <tbody>
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>
        </tbody>
        </table>",
            htmlspecialchars($row["title"], ENT_QUOTES),
            htmlspecialchars($row["authorName"], ENT_QUOTES),
            htmlspecialchars($row["image"], ENT_QUOTES),
            htmlspecialchars($row["description"], ENT_QUOTES),
            htmlspecialchars($row["publicationDate"], ENT_QUOTES)
        );
    }
}

function textBoxesAppear()
{
    printf("<form method='GET' action='' enctype='multipart/form-data'>

            <label for='title'>Title:</label><br>
            <input type='text' id='title' name='title' autofocus><br>

            <label for='authorName'>Author Name:</label><br>
            <input type='text' id='authorName' name='authorName'><br><br>

            <label for='image'>image:</label><br>
            <input type='file' name='choosefile' value='' />

            <div>

                <button type='submit' name='uploadfile'>

                UPLOAD

                </button>

            </div>

            <label for='description'>description:</label><br>
            <input type='text' id='description' name='description'><br><br>

            <label for='publicationDate'>publicationDate:</label><br>
            <input type='text' id='publicationDate' name='publicationDate'><br><br>

            <button type='submit' name='DoneInsertion' >

                Done

            </button>
        </form>"
    );
}

if(isset($_POST['DoneInsertion'])) 
{
    $title = $_POST['title'];
    $Aname = $_POST['authorName'];

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

    $description = $_POST['description'];
    $pubDate = $_POST['publicationDate'];

    $folder = "image/".$filename;   

    // SQL query to insert user data into the users table
    $query= "INSERT INTO Books VALUES('{$title}','{$Aname}','{$filename}','{$description}','{$pubDate}')";
    $add_book = mysqli_query($db,$query);
    
    // displaying proper message for the user to see whether the query executed perfectly or not 
        if (!$add_book) {
            echo "something went wrong ". mysqli_error($db);
        }

        else {
            echo "<script type='text/javascript'>alert('User added successfully!')</script>";
        }         
}

?>
