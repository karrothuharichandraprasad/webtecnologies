<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:login.php");
}
$url=$_SESSION['addr'];
$name=$_SESSION['name'];
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'facebook';
$conn = mysqli_connect($host, $username, $password, $dbname);
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
        .ms{
            margin-left: 15px;
            padding: 10px;
            background-color: whitesmoke;
            height: 80px;
            width: 190px;
            border-radius:5px;
        }
        .posts{
            display: flex;
            flex-direction: column;
            gap:1em;
        }
        .sender{
            color:  rgb(28, 57, 101);
            font-size: 15px;
            padding: 2px;
        }
        .msg{
            color:  black;
            font-size: 13px;
            padding: 2px;
        }
        .post{
            background-color: black;
            width: fit-content;
            color:aliceblue;
        }
        .type{
            padding: 3px;
            margin: 5px;
        }
        .inp{
            width:200px;
            height:30px;
            border-radius:5px;

        }
        .butt{
            width:80px;
            height:30px;
           background-color:deepskyblue;
           border-radius:5px;
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
<br><br>

      
    <div class="posts">
    <?php
        $res = mysqli_query($conn,"select * from likes where url='$url'");
        $i = mysqli_fetch_assoc($res);
        $date=$i['date'];
        $like=$i['likes'];
        $user=$i['Username'];

        echo "<div class='post'>";
        echo "<img src='uploads/{$url}' height='400px' width='300px'>";
        echo "<br><label for='u'>Name:{$user}</label>";
        echo "<br><label for='u'>Likes:{$like}</label>";
        echo "<br><label for='u'>Date:{$date}</label>";
        echo "</div>";
        
        $res = mysqli_query($conn,"select * from comment where url='$url' order by date");
        if (mysqli_num_rows($res) > 0) {
            while ($i = mysqli_fetch_assoc($res)) {?>
            <div class="ms">
               <?php echo "<br><label class='sender'>{$i['from_p']}:</label><br>"; ?>
               <?php echo "<label class='msg'>{$i['message']}</label>"; ?>
           </div>
            <?php } }?>
        <div class='type'>
            <form action="incm.php" method="post">
                <input type="type" class="inp" name="msg">
                <input type="submit" name="submit" class="butt">
            </form>
        </div>
    </div>
    </body>
</html>