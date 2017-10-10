<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='email' name='mail'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{ 
 include('db.php');
 $mail=$_POST['mail'];
 $query = "SELECT id FROM users where email='".$mail."'";
        $result = mysqli_query($conn,$query);
        $res = mysqli_fetch_array($result);
 if(count($res)>=1)
 {
  extract($res);
  $to=$mail;
  $subject='Remind password';
  $message='Your password : '.$res; 
  $headers='From:valluri.sriram99@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    echo'Check your mail';
  }
  else
  {
   echo'mail is not send';
  }
 }
 else
 {
  echo'You entered mail id doesn\'t exist';
 }
}
?>
</body>
</html>