<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/css/style.css" />
<title>Mon Site</title>
</head>
<body>
<h1>Welcome!!</h1>
  <p>don't be afraid it's free</p>
<div align="center">
  <form action="user.php" method="post">
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
            <td align="right"><label for="pass_confirmation">Don't be so lazy confirm your password!: </label></td>
            <td><input type="text" name="confirm_password" placeholder="confirm password"></input></td>
        </tr>
        <tr>
            <td></td>
            <td align ="center"><br/><input type="submit" value="Inscription"></input></td>
        </tr>
      </table>


</form>
</div>

</body>
</html>
