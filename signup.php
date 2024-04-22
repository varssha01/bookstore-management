<?php
session_start();
$data = mysqli_connect("localhost","root","","reverie");
if($data==false){
die("connection_error");
}
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $uname = $_POST['uname'];
  $pass= $_POST['pass'];
  if($name !="" && $email !="" && $uname !="" && $pass!=""){
    $sql="insert into signup values('$name', '$email', '$uname', '$pass')";
    if($data->query($sql)){
        echo "Inserted";
        header("Location:login.php");
        exit();
    }
    else{
        echo "unsuccessful";
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: black; /* Set the background to black */
    color: white; /* Set the text color to white */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.input {
    padding: 10px;
    width: 500px;
    border: 1px solid white; /* Set border color to white */
    border-radius: 20px;
    background: black; /* Set input background to black */
    color: white; /* Set input text color to white */
}
.button {
    color: black; /* Button text color */
    border: none;
    width: 200px;
    border-radius: 20px;
    cursor: pointer;
    padding: 10px;
}
a{
    font-family: Garamond, serif; color: white;
}
</style>
</head>
<body>
<div class="login">
    <center><h1 style="font-family: Garamond, serif;">REGISTRATION</h1></center>
    <form name="f1" action="#" method="POST">
        <p style="font-family: Garamond, serif;">NAME:</p> <input type="text" name="name" class="input" required><br><br>
        <p style="font-family: Garamond, serif;">EMAIL:</p> <input type="text" name="email" class="input" required><br><br>
        <p style="font-family: Garamond, serif;">USERNAME:</p> <input type="text" name="uname" class="input" required><br><br>
        <p style="font-family: Garamond, serif;">PASSWORD:</p> <input type="password" name="pass" class="input" required><br><br>
        <center><button type="submit" class="button" name="submit"><p style="font-family: Garamond, serif;">SIGN UP</p></button></center>
    </form><br><br>
    </center>
</div>
</body>
</html>