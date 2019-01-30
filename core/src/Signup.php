<?php session_start();
$pdo = new PDO('mysql:host=database; dbname=mon_site','mon_user','secret!');
if(isset($_SESSION['id'])){
  if (isset($_POST['submit'])) {
    if (isset($_POST['username'],$_POST['password'],$_POST['confirm_password'],$_POST['mail'])){
        $username=strip_tags($_POST['username']);
        $password=strip_tags($_POST['password']);
        $confirm_password=strip_tags($_POST['confirm_password']);
        $mail=strip_tags($_POST['mail']);
            if(empty($username) || empty($password) || empty($confirm_password) || empty($mail)){
              echo "All fields must be set";
            }elseif ($password === $confirm_password){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                      if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)){
                      $statement = $pdo->prepare("SELECT * FROM user WHERE username = :username");
                      $statement->execute([":username" => $username]);
                      $data = $statement->fetch(PDO::FETCH_ASSOC);
                      if (!$data) {
                        $query = 'INSERT INTO users VALUES (NULL,:username,:password,:mail)';
                        $statement = $pdo->prepare($query);
                        $status = $statement->execute([':username'=>$username,':password'=>$password,':mail'=>$mail]);
                        $msg = 'Congratulation you have been registrated go to <a href="Login.php">Login</a>';
                        $error = 'This User exit please choose another name';
                        echo  ($status===false) ? $error : $msg;
                    }
                  }else{echo "Your mail is invalid";}
                }else {echo "Your password and it confirmation are different";}
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
  <p class="par" align="center">Don't be afraid it's free</p></br></br>
<div align="center">
  <form action="" method="post">
      <table></br>
        <tr>
            <td align="right"><label for="username">Please enter your username: </label></td>
            <td>  <input type="text" name="username" placeholder="username"></input></td>
        </tr>
        <tr>
            <td align="right"><label for="mail">Please enter your mail:</label></td>
            <td><input type="text" name="mail" placeholder="mail"></input></td>
        </tr>
        <tr>
            <td align="right"><label for="password">Please enter your password:</label></td>
            <td><input type="password" name="password" placeholder="password"></input></td>
        </tr>
        <tr>
            <td align="right"><label for="pass_confirmation">Don't be so lazy confirm your password!: </label></td>
            <td><input type="password" name="confirm_password" placeholder="confirm password"></input></td>
        </tr>
        <tr>
            <td></td>
            <td align ="center"><br/><input type="submit" name="submit" value="Signin"></input></td>
        </tr>
      </table>
<?php }else{ echo "You are even logged in";} ?>
</form>
</div>
</body>
</html>
