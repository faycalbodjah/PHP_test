<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Mon Site</title>
</head>
<body>
  <h1>Welcome!! <?php echo $_SESSION['username'];?></h1>
<h2></h2>
<div>
  <form action="user.php" method="post">
        <div>
          Please give a title to you article:
          <input type="text" name="title" placeholder="title"></input>
        </div>
        <hr>
      <div>
        <div>
          Article:
          <textarea name="content" rows="50" cols="100"></textarea>
        </div>
      <div>
        <input type="submit" value="Add article"></input>
      </div>
  </form>
</div>

</body>
</html>
