<?php session_start();
  $pdo = new PDO('mysql:host=database; dbname=mon_site','mon_user','secret!');
	if (isset($_POST['submit'])) {

  		if (isset($_POST['username'],$_POST['password'])) {

          $username=strip_tags($_POST['username']);

          $password=strip_tags($_POST['password']);
    			   if (empty($username) || empty($password)) {
                   echo "Please set your username and your password";
               }else{
                      $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
                      $stmt->execute([":username" => $username]);
                      $data = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($data) {
                           if(password_verify($password,$data['password'])){
                               $_SESSION['id']=$data['id'];
                               $_SESSION['username']=$data['username'];
                               header("Location: mySpace.php");
                             }else{echo "False Password";}
                        }else{echo "User not found";}
                    }
      }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/css/style.css" />
<title>Mon Site</title>
</head>
<body>
  <h1 align ="center">Welcome to BlogArt</h1></br></br>
<div align="center">
  <form action="" method="post">
      <table>
        <tr>
            <td align="right"><label for="username">Please enter your username: </label></td>
            <td>  <input type="text" name="username" placeholder="username"></input></td>
        </tr>
        <tr>
            <td align="right"><label for="password">Please enter your password:</label></td>
            <td><input type="text" name="password" placeholder="password"></input></td>
        </tr>
        <tr>
            <td></td>
            <td align ="center"><br/><input type="submit" name ="submit" value="Login"></input></td>
        </tr>
      </table>
</form>
</div>

</body>
</html>
