<?php session_start();
if(isset($_SESSION['id'])){
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

<h1 align="center">You article</h1>
<h3 align="center"><?php echo "There is your article " .$_SESSION['username'];?></h3>
<div>
  <p><?php
    $query = 'SELECT * FROM article WHERE id = :id';
    $statement = $pdo->prepare($query);
    $statement->execute([':id'=>$_GET['article_id']]);
    $dt=$statement->fetch(PDO::FETCH_ASSOC);
   echo $dt['content'];?>
 </p>
</div>
<?php
}else{echo "You are not authorized";}
?>
</body>
</html>
