<?php
$fnam=$_POST["un"];
$email=$_POST["e"];
$dob=$_POST["dob"];
$gen=$_POST["r"];
$pass=$_POST["pas"];
$a=$_POST["add"];
$rel=$_POST["rel"];
$l=$_POST["lang"];
?>
<h1 style="background-color: blanchedalmond;" >Entered Data: </h1>
<table border="1" >
  <tr><td>Username: </td>
  <td><?php echo $fnam;?></td>
</tr>
<tr><td>EMAIL: </td>
  <td><?php echo $email;?></td>
</tr>
<tr><td>Gender: </td>
  <td><?php echo $gen;?></td>
</tr>
<tr><td>Religion: </td>
  <td><?php echo $rel;?></td>
</tr>
<tr><td>Date of birth: </td>
  <td><?php echo $dob;?></td>
</tr>
<tr><td>Language: </td>
  <td><?php foreach($l as $item){
    echo $item . "\n";
}?></td>
</tr>
<tr><td>Address: </td>
  <td><?php echo $a;?></td>
</tr>
<tr><td>Password: </td>
  <td><?php echo $pass;?></td>
</tr>
</table>