<?php
if(isset($_SESSION['id'])){
if(isset($_POST['submit'])){
  if(isset($_POST['comment'])){
    $comment = strip_tags($_POST['comment']);
    if(empty($comment)){
      echo "Please put a content in your comment";
    }else{
      $stmt=$pdo->prepare("INSERT INTO comment VALUES (NULL,:username,:content,:article_id)");
      $status = $stmt->execute([':username'=>$_SESSION['username'],':content'=>$comment ,':article_id'=>$data['id']])
    }
  }
}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/css/style.css" />
<title>Mon Site</title>
</head>
<body>
<form action="" method="post">
      <label>Comment
        <input type="text" name="comment"></input>
      </label>
      <button type="submit">Add</button>
</form>
</body>
<?php }else {
  echo "You are not authorized.";
} ?>
</html>
