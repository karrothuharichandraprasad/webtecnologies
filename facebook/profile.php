<?php
$name=$_POST["name"];
$email=$_POST["email"];
$dob=$_POST["date"];
$mobile=$_POST["mobile"];
$add=$_POST["address"];
?>
<h1 style="background-color: blanchedalmond;" >Entered Data: </h1>
<table border="1" >
  <tr><td>Username: </td>
  <td><?php echo $name;?></td>
</tr>
<tr><td>EMAIL: </td>
  <td><?php echo $email;?></td>
</tr>
<tr><td>MObile Number: </td>
  <td><?php echo $mobile;?></td>
</tr>
<tr><td>Date of birth: </td>
  <td><?php echo $dob;?></td>
</tr>
<tr><td>Address: </td>
  <td><?php echo $add;?></td>
</tr>
</table>