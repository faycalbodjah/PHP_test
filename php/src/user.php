<?php session_start();
if (isset($_POST['username'])) {
	$_SESSION['username'] = strip_tags($_POST['username']);
	$username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Mon Site</title>
</head>
<body>
<?php
require "header.php";
?>
  <h1>Welcome!! <?php echo $username;?> in your personal space</h1>
	<h2><a href="index.php">Logout<a><h2>
<h2>Your articles: </h2>
<table border="1">
    <tr>
        <th>Author</th>
        <th>Title</th>
        <th>Content</th>
    </tr>
        <tr>
            <td><?php echo "author"; ?></td>
            <td><?php echo "title"?></td>
            <td><a href="content.php" target="_blank">content</a></td>
        </tr>
</table>
<button type="button"><a href="articleAdd.php" target="_blank">Add artcile</a></button>
<div>

</div>
</body>
</html>
