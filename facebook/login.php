<?php
session_start();
?>
<html>
    <style>
        body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color:lightblue;
}

h2 {
  text-align: center;
  margin-bottom: 30px;
  font-size:50px;
  font-family: Arial, sans-serif;
  color:deepskyblue;
}

form {
  margin: auto;
  width: 50%;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 10px;
  color:skyblue;
  background-color:lavender;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 20px;
}
input[type="submit"] {
  background-color: #4267b2;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
        
        
    </style>
    <body>
        <?php
        $error='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["password"];
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'facebook';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            $sql = "select * from reg_details where Username='$name' and Password='$pass'";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                $_SESSION['name']=$name;
                header('Location:home.php');
                exit(1);
            }
            else{
                $error='*Invalid credentials';
            }
        }
        ?>

            <h2 class="t1">Facebook</h2>
            <div class="top">

            </div>
            <div class="login">
                
                <br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   <?php echo "<label for='error' class='error'>{$error}</label>"; ?>
                   <label for="username">Username:</label>
                    <input type="text" name="name" id="username" placeholder="Enter your Name" required>

                      <label for="password">Password:</label>
                      <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <input type="submit" name="Login" value="Login" class="button1">
                <br><br><br>
                
                <label for='acc' class='acc'>Need an account?<a href="signup.php">Create account</a></label>
      </form> 
              </div>
        
    </body>
</html>