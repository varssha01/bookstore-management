<?php

$conn = mysqli_connect('localhost','root','','reverie');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#menu").click(function(){
    $("#panel").slideToggle("slow");
  });
  
  $("#search").click(function(){
    $("#art").show();
  })

});
</script>
<style>
    .mossgalimg{
    background-image: url(https://images.alphacoders.com/132/1326370.png);
    background-size: cover; /* You can adjust this property to control how the image is displayed */
    width: 1270px; /* Set the width of your div */
    height: 700px;
    text-align: left; /* Align text to the left */
    display: flex; /* Center text horizontally */
    align-items: center; /* Set the height of your div */
  }
  .menu {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 10px;
    color: #f0f0f0;
  }
  .bar {
  width: 30px;
  height: 3px;
  background-color: white;
  margin: 6px 0;
  transition: 0.4s;
}
.admin{
    position: absolute;
    top: 15px;
    right: 60px;
    padding: 10px;
    color: #f0f0f0;
  }
    #log{
    position: absolute;
    top: 15px;
    right: 60px;
    padding: 10px;
    color: #f0f0f0;
  }
  #panel {
  padding: 5px;
  text-align: center;
  background-color:#8b0000;
  border: solid 1px #c3c3c3;
    padding: 50px;
  display: none;
  width: 1670px; /* Set the width of your div */
    height: 700px;
}
hr {
  background-color: #fff; /* Background color for white line */
  height: 0.1px; /* Height of the line, adjust as needed */
  width: 30%; /* Width of the line, adjust as needed */
  margin: 0 auto; /* Center the line horizontally on the page */
}
a{
  font-family: Garamond, serif; color: white;"
}
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
    width: 300px;
    border: 1px solid black; /* Set border color to white */
    border-radius: 20px;
    background: white; /* Set input background to black */
    color: black;
    height:50px;/* Set input text color to white */
}
button {
    color: white; /* Button text color */
    border: none;
    width: 150px;
    cursor: pointer;
    padding: 10px;
    background:brown;
}

.card {
    border: none;
}

#aaa{
    color: black; /* Button text color */
    border: none;
    width: 70px;
    border-radius: 10px;
    cursor: pointer;
    padding: 10px;
    height: 40px;
    background:wheat;
    text-align: center;
}


</style>
</head>
<body>

<div class="container-fluid border">
<div id="panel" style="font-family: Garamond, serif; color: white;">
  <br><br><br><br><a href="page1.php">HOME</a><br><br><hr><br>
  <a href="books.php">BOOKS</a> <br><br><hr><br><br><br><br><br>
</div>
<div class="mossgalimg">
  <div class="menu" id="menu">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    </div> 
    

    <h1 style="font-family: 'Snell Roundhand', cursive; color: white; font-size: 100px;">
    &nbsp;REVERIE<br><br></h1><br><br><h4 style="font-family: 'Snell Roundhand', cursive; color: white;">An Antiquarian Bookshop</h4>
</div></div><br><br>
<div class="container pt-3">
<br>
<div class="row">
<div class="col-lg-12" style="font-family: Garamond, serif;"><br><br><h3>LOOK OUT FOR OUR BEST.</h3>
  <br>
  <p style="font-family: Garamond, serif; font-size: 20px;"> 
  <center>
    <form method="POST" action="#" enctype="multipart/form-data">
    <input type="text" name="genre" placeholder="Search by genre">
    <button type="submit" value="search" name="search" id="search">SEARCH</buton>
 </form>
  </center>
</p><br>
<br>
</div>
</div>
</div>


     <div class="container" id="art">
     <div class="card-columns">
     <?php
     if(isset($_POST['search'])){
      $genre = $_POST['genre'];
      $select = mysqli_query($conn,"SELECT * FROM books where genre='".$genre."'");
    while($row = mysqli_fetch_assoc($select)){
         ?>
    <div class="card">
      <div class="card-body text-center">
        <div class="card-text">
          <img src="img/<?php echo $row['pic']; ?>" height="300" width="300"  alt=""><br>
        <?php echo $row['bname']; ?><br>
        By <?php echo $row['author']; ?><br>
        <?php echo $row['genre']; ?><br>
        <?php echo $row['yearb']; ?><br>
        <a href="inquire.php?books=<?php echo $row['bname'];?>"><button>INQUIRE</button></a>
      </div>
    </div>
    </div>
    <?php } }?>
    </div>
    </div>
<br>
<br><br><br>
<div class="container">
<h3 style="font-family: Garamond, serif;">CONTACT US:</h3>
<div class="row" style="font-family: Garamond, serif;">
<div class="col-lg-6">
                                                            
Tuesday - Thursday: 10:00 am - 5:00 pm<br>
Friday - Saturday: 10:00 am - 5:00 pm <br>
Off Hours Visits available by Appointment<br>
Sunday - By Appointment or Chance<br>
</div></div><br>

<div class="row" style="font-family: Garamond, serif;">
<div class="col-lg-6">
<h3 style="font-family: Garamond, serif;">CONTACT US:</h3>
+91 78998 xxxxx | abc@example.com
</div>
</div>
</div>
<br>
<br>
<br>
</div>
</center>

</body>
</html>