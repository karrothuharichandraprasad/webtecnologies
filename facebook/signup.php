<html>
    <style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color:deepskyblue;
}

h2 {
  text-align: center;
  margin-bottom: 30px;
  font-size:50px;
  color:white;
}

form {
  margin: auto;
  width: 50%;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color:honeydew;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="date"],
input[type="textbox"],
input[type="radio"] {
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
        $nerror='';
        $eerror='';
        $derror='';
        $perror='';
        $op='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $cpass = $_POST["cpass"];
            $email= $_POST["email"];
            $date=$_POST["date"];
            $flag=true;
            if (empty($name)) {
                $nerror = "*Name is required";
                $flag = false;
            } 
            else {
                if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $flag = false;
                    $nerror = "*Only letters and white spaces are allowed";
                }
            }
            if (empty($email)) {
                $flag = false;
                $eerror="*Email required";
            } 
            else {
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $flag = false;
                    $eerror="*Invalid email";
                }
            }
            if ($cpass != $pass) {
                $flag = false;
                $perror="*Passwords must match";
            }
            if ($flag) {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'facebook';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            $sql = "INSERT INTO  reg_details( Username,Email,Password,DOB) 
            VALUES('$name', '$email', '$pass','$date')";
            $res = mysqli_query($conn,$sql);
            $op="Succesfully signed up";
        }
        else{
            $op="Registration not done";
        }
        }
        ?>
    <h2 class="title">Facebook </h2>

    <div class="login">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <?php echo "<label for='op' class='op'>{$op}</label>"; ?>
    <form action="profile.php" method="post">
    <label for="username">Username:</label>
  <input type="text" name="name" id="username" required>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>
  <label for="dob">DOB:</label>
  <input type="date" name="date" id="date" required>
  <label for="mobile">Mobile Number:</label>
  <input type="text" name="mobile" id="mobile" required>
  <label for="Address">Address:</label>
  <input type="textbox" name="Address" id="Address" required>
  <label for="password">Password:</label>
  <input type="password" name="pass" id="pass" required>
  <label for="password">Confirm Password:</label>
  <input type="password" name="cpass" id="cpass" required>
     



  

  <input type="submit" value="Register" name="Signup">
  <br><br><br>



<label for='acc' class='acc'>If you signed......<a href="login.php">Login</a></label>
      </form>     
</form>
</div>
    </body>
</html>