<?php
session_start();
$conn = mysqli_connect('localhost','root','','reverie');
if(isset($_POST['insert'])){
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
        $insert = "INSERT INTO books(pic,bname,author,genre,yearb) VALUES('$pic','$bname','$author','$genre','$yearb')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file($pic_temp,$pic_folder);
            $message[] = 'New product added successfully';
        }else{
            $message[] = 'could not add the product';
        }
    }
}
    if(isset($_GET['delete'])){
        $bname = $_GET['delete'];
        mysqli_query($conn,"DELETE FROM books where bname= '".$bname."'");
        header('location:admin1.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th{
    
    padding: 15px;
    text-align:center;
    
}
td{
    
    padding: 15px;
    text-align:center;
}
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: white; /* Set the background to black */
    color: black; 
    font-family: Garamond, serif;/* Set the text color to white */
}
.input {
    padding: 5px;
    width: 250px;
    border: 1px solid black; /* Set border color to white */
    background: white; /* Set input background to black */
    color: black;
    height:20px;/* Set input text color to white */
}
button {
    color: black; /* Button text color */
    border: none;
    width: 200px;
    cursor: pointer;
    padding: 10px;
    background: brown;
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
</head>
<body>
    <div class="hi" style="background:brown; color:white; height:40px; font-size:30px;"><center>ADMIN PAGE</center></div>
<div class="container-fluid border">
    <center><br>
    <h1>Insert New book</h1>
    <div class="container">
    <form action="#" method="post" enctype="multipart/form-data">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label for="image">Select an image: </label>
        <input type = "file" accept="image/png, image/jpeg, image/jpg" name="pic" class="box"><br><br>
        Book name:&nbsp&nbsp&nbsp&nbsp<input type="text" name="bname" class="input" required><br><br>
        Author:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="text" name="author" class="input" required><br><br>
        Genre:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <input type="text" name="genre" class="input" required><br><br>

        Year:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    <input type="text" name="yearb" class="input" required><br><br>
        <br><br>
        <button type="submit" value="insert" name="insert">INSERT</button><br><br>
    </form><br>
    </div>
    <br><br><br>
    <?php
$select = mysqli_query($conn,"SELECT * from books");

?>
<table class="product-display-table">
<thead>
<tr>
<th><h3>BOOK</h3></th>
<th><h3>NAME</h3></th>
<th><h3>AUTHOR</h3></th>
<th><h3>GENRE</h3></th>
<th><h3>YEAR</h3></th>
<th colspan="2"><h3>ACTION</h3></th>
</tr>
</thead>
<?php
 while($row = mysqli_fetch_assoc($select)){
     ?>
     <tr>
        <td><img src="img/<?php echo $row['pic']; ?>" height="100" width="100" alt=""></td>
        <td><?php echo $row['bname']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['yearb']; ?></td>
        <td>
        <a href="admin2.php?update=<?php echo $row['bname'];?>" ><button>UPDATE</button></a><br><br>  
        <a href="admin1.php?delete=<?php echo $row['bname'];?>"><button>DELETE</button></a>
            </td>
     </tr>
<?php
 };
 ?>
</table>
<br><br>
<a href="page1.php"><button>GO TO HOME PAGE</button></a>
<br><br><br><br><br>
</center>
</div>
</body>
</html>