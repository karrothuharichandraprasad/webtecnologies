<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:login.php");
}
?>
<html>
    <style>
        .dashboard {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
}
        .widget {
  background-color: #f2f2f2;
  border-radius: 5px;
  padding:15px;
  width: 300px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  background-color:thistle;
}
a{
    text-decoration:none;
    padding-left:90px;
    font-size:25px;
}

        *{
            font-family: "Poppins", sans-serif;
            
        }
        body{
            background-color: cadetblue;
        }
      
        *{
            font-family: "Poppins", sans-serif;
            
        }
        
        .title{
            margin: auto;
            font-size: 0.8cm;
            color: rgb(255, 255, 255);
        }
        .date{
            color:white;
            font:8px;
        }
        .likes{
            color:pink;
            font:15px;
        }
        .posts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 50px;
        margin: 0 auto;
        max-width: 1200px;
        }
        
        .post {
        background-color: rgb(28, 57, 101);
        height: 305px;
        width: 290px;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
        padding: 10px;
        border-radius: 5px;
        margin: 20px;
      }
      input[type="file"]::file-selector-button {
  background-image: url(upload.png);
  background-size:290px 290px;
  height: 290px;
  width: 287px;
}
input[type='file'] {
    color: rgba(0, 0, 0, 0);
}
    .button2{
            height: 20px;
            width: 287px;
            border: 0ch;
            font-size: 18px;
            background-color: white;
            color: rgb(28, 57, 101);}
    </style>
    <body>
    <?php echo "<h2 class='title'>Welcome {$_SESSION['name']}</h2>"; ?>
    <hr>
    <div class="dashboard">
  <div class="widget">
   <a href="home.php">Home</a>
  </div>
  <div class="widget">
  <a href="dashbord.php">Dashboard</a>
  </div>
  <div class="widget">
  <a href="logout.php">Logout</a>
  </div>
</div>
    
    
    <div class="posts">
        <div class="post">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" class="inp" name="file">
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'facebook';
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $name = $_SESSION['name'];
        $res = mysqli_query($conn,"select * from likes where Username = '$name'");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  ?>
           
           <div class="post">
               <img src="uploads/<?=$images['url']?>" height="280px" width="280px">
               <?php echo "<br><label for='like' class='likes'>Likes:{$images['likes']}</label><br>"; ?>
               <?php echo "<label for='date' class='date'>Date:{$images['date']}</label>"; ?>
           </div>
                
  <?php } }?>
        
    </div>

    </body>
</html>