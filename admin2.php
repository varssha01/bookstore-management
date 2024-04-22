<?php
session_start();
$conn = mysqli_connect('localhost','root','','reverie');
if(isset($_POST['update'])){
    $bname = $_POST['bname'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $yearb = $_POST['yearb'];
    $pic = $_FILES['pic']['name'];
    $pic_temp = $_FILES['pic']['tmp_name'];
    $pic_folder = 'img'.$pic;

    if(empty($bname) || empty($author) || empty($pic) || empty($genre) || empty($yearb)){
        $message[] = 'please fill out all';
    }
    else{
        $update = "UPDATE books SET pic='$pic', bname='$bname',author='$author',genre='$genre',yearb='$yearb' WHERE bname='".$bname."'";
        $upload = mysqli_query($conn,$update);
        if($upload){
            move_uploaded_file($pic_temp,$pic_folder);
        }else{
            $message[] = 'could not add the product';
            echo "error";
        }
    }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: white; /* Set the background to black */
    color: black; 
    font-family: Garamond, serif;/* Set the text color to white */
}
input {
    padding: 5px;
    width: 250px;
    border: 1px solid black; /* Set border color to white */
    background: white; /* Set input background to black */
    color: black;
    height:20px;/* Set input text color to white */
}
button {
    color: white; /* Button text color */
    border: none;
    width: 200px;
    cursor: pointer;
    padding: 10px;
    background:brown;
}
a{
    font-family: Garamond, serif; color: black;
}
.container {
        background-color: #faebd7; /* Light yellow background color */
        border: 1px solid black; /* Light gray border */
        padding: 20px; /* Add some padding to the container */
        width: 600px; /* Set the width of the container as per your design */
        margin: 0 auto; /* Center the container horizontally */
    }

    </style>
<body>
<div class="hi" style="background:brown; color:white; height:40px; font-size:30px;"><center>ADMIN PAGE</center></div>
<?php

  if(isset($message)){
      foreach($message as $message){
          echo '<span class="message">'.$message.'</span>';
      }
  }
?>
<div>
<?php
$bname = $_GET['update'];
$select = mysqli_query($conn,"SELECT * FROM books where bname='".$bname."'");
while($row = mysqli_fetch_assoc($select)){
?><br><br><br>
<div class="container">
<form action="#" method="POST" enctype="multipart/form-data"><center>
<h1>UPDATE</h1><br>
NAME:  &nbsp&nbsp&nbsp &nbsp&nbsp<input type = "text" value="<?php echo $row['bname'];?>" name="bname" class="box"><br><br>
ARTIST: &nbsp&nbsp&nbsp&nbsp  <input type = "text" value="<?php echo $row['author'];?>" name="author" class="box"><br><br>
GENRE:  &nbsp&nbsp&nbsp&nbsp <input type = "text" value="<?php echo $row['genre'];?>" name="genre" class="box"><br><br>
SIZE: &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp <input type = "text" value="<?php echo $row['yearb'];?>" name="yearb" class="box"><br><br>
IMAGE: &nbsp&nbsp<input type = "file" accept="image/png, image/jpeg, image/jpg" name="pic" class="box"><br><br><br>
<button type = "submit" name="update" value="update product">UPDATE BOOK</button><br><br><br>
</center>
</form>
<?php } ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form data here, save to a database, etc.

    // After successful processing, redirect the user to a different page.
    header("Location: admin1.php");
    exit; // Make sure to exit to prevent further script execution.
}
?>
</div>
</div>
</body>
</html>