
<form action="register.php" method="post">
username:<input type="text" name="username"><br>

email:<input type="text" name="email"><br>

password:<input type="text" name="password"><br>
<input type="submit"name="submit">
  </form>
  <?php
  include_once('connect.php');
  if(isset($_POST['submit'])){
   $username=$_POST['username'];

   $email=$_POST['email'];

   $password=$_POST['password'];
   if(!empty($username)&&!empty($email)&&!empty($password)){
    $sql=mysql_query("select * from users");
    while ($row=mysql_fetch_array($sql)) {
    $user=$row['username'];
    $eml=$row['email'];
  if($user!=$username&&$eml!=$email){
    $sql2=mysql_query("insert into users(id,username,email,password)values('$username','$email','$password')");
  }
   }

   }else{
    echo"All fields required";   }
  
}
  ?>
