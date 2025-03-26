<?php
session_start();
if (!isset($_SESSION["user"])) {
 header("Location: login.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>

      body{
        height: 100vh;
          background-image: url('images/back.webp'); 
         background-size: cover; 
         background-position: center; 
         background-repeat: no-repeat;
         padding: 30px;
      }
       .body2{
         display: flex;
         align-items: center;
         justify-content: center;
         height: 80vh; 
         flex-direction: column;
         padding: 10px ;
       }
      
      .container{
        flex-direction: column;
         display: flex;
         border-radius: 20px;
         max-width: 600px;
         margin:0 auto;
         padding:20px;
         box-shadow: 0px 0px 20px black;
      }

      .btn1{
  
         box-shadow: 0px 0px 10px rgb(0, 0, 0);
         color: black;
         margin: 30px;
         text-align: center;
         border-radius: 10px;
         background-color: #5cf95c;
      }
  .btn1:hover{
     background-color: green;
     color: white;
  }

      a{
        text-decoration: none;

        font-weight: 500;
        font-size: x-large;
       font-family: 'Times New Roman', Times, serif;
      }
      h1{
  
        justify-content: center;
        display: flex;
        align-items: center;
      }

    </style>
</head>
<body>
  <h1>Smart Market Access: Join as a Farmer or Buyer:-</h1>
    <div class="body2">
      <div class="container">
        <a href="buyer.php"><div class="btn1">Buyer</div></a>
        <a href="farmer.html"><div class="btn1">Farmer</div></a>
 </div>
    </div>
         <script src="dash.js"></script>
</body>
</html>

