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
        .title{
            margin: auto;
            font-size: 0.8cm;
            color: rgb(255, 255, 255);
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
        background-color: cornsilk;
        height: 430px;
        width: 280px;
        padding: 10px;
        border-radius: 5px;
        margin: 20px;
      }
      .img {
  height: 40px;
  width: 40px;
}
input[type="text"]{
    visibility: hidden;
}
.comment{
    position: relative;
    top: -90px;
    left:80px;
    width:50px;
    height: 50px;
}
    </style>
    <body>
    <?php echo "<h2 class='title'>Welcome {$_SESSION['name']}</h2>"; ?>
    <hr>
    <br>
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
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'facebook';
        $name=$_SESSION['name'];
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $res = mysqli_query($conn,"select * from likes order by likes desc");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  
           $x=$images['url'];
           $y="";
           $a=mysqli_query($conn,"select * from images where user='$name' and url='$x'");
           if(mysqli_num_rows($a) > 0){$y='dislike.png';}
           else{$y='love2.png';}
           ?>
           <div class="post">
               <img src="uploads/<?=$x?>" height="340px" width="280px">
               <?php echo "<br><form action='like.php' method='post'><input type='image'class='img' src='$y' name='submit'><label for='like' class='likes'>{$images['likes']}</label><input type='text' id='url' name='url' value='$x'></form><br>"; ?>
               <?php echo "<br><form action='comments.php' method='post'><input type='image' src='comment1.jpg' class='comment' name='submit'><input type='text' id='url' name='url' value='$x'></form>"; ?>
           </div>
                
  <?php } }?>
        
    </div>
    
    </body>
</html>