<?php session_start();
if (isset($_SESSION['id'])){
	$sesID=$_SESSION['id'];
	$pdo = new PDO('mysql:host=database; dbname=mon_site','mon_user','secret!');
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

<div class="topnav">
		  <a class="active" href="#">Home</a>
		  <a href="articleAdd.php">Add article</a>
		  <a href="Logout.php">Logout</a>
			<p><?php echo $_SESSION['username'];?></p>
</div>
<h2 align="center">Your articles: </h2>
<div align="center">
			<table border="1">
		    <tr>
		        <th>Author</th>
		        <th>Title</th>
		        <th>Content</th>
		    </tr>
					<?php $query = 'SELECT * FROM article WHERE author_id = :author_id';
					$statement = $pdo->prepare($query);
					$statement->execute([':author_id'=>$sesID]);
					while ($data = $statement->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $_SESSION['username']; ?></td>
            <td><?php echo $data['title'];?></td>
            <td><a href="content.php?article_id=$data['id']">content</a></td>
						<td>

						</td>
        </tr>
			<?php } ?>
			</table>
</div>
</body>
<?php }else{echo "You are not authorized";} ?>
</html>
