<?php
session_start();
$data = mysqli_connect("localhost","root","","reverie");
if($data==false){
die("connection_error");
}
if(isset($_POST['login'])){
$adname="admin";
$adpass="0613";
  $uname = $_POST['uname'];
  $pass= $_POST['pass'];
  if($uname !="" && $pass!=""){
    if(($uname==$adname)&&($pass==$adpass)){
        header("Location: admin1.php");
    }
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<script>
    function demo(){
        var n=document.f1.uname.value;
var p=document.f1.pass.value;
if(p=="" || p==null || n=="" || n==null){
    alert("please enter a value");
    }
}
</script>
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
    <center><h1 style="font-family: Garamond, serif;">LOGIN</h1></center>
    <form name="f1" action="#" method="POST" >
        <p style="font-family: Garamond, serif;">USERNAME:</p> <input type="text" name="uname" class="input" required><br><br>
        <p style="font-family: Garamond, serif;">PASSWORD:</p> <input type="password" name="pass" class="input" required><br><br><br><br>
        <center><button type="submit" class="button" name="login"><p style="font-family: Garamond, serif;">LOGIN</p></button></center>
    </form><br><br>
</div>
</body>
</html>